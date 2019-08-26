<!DOCTYPE html>
  <html>
    <head>
      <?php require_once "../aset/view/headcontent.php"; ?>
    </head>

    <body>
      <?php    
      ob_start();
      session_start();
      if(!isset($_SESSION['username'])) header('location:../index.php');

      require_once "../aset/view/header.php";
      require_once "../fungsi/db.php";
      require_once "../fungsi/fungsi.php";

      //SETTING FUNGSI
      $barang             = tampilkan_barang();
      $tampilkan_unit     = tampilkan_unit();
      $nourut             = 1;
      $pengeluaran        = tampilkan_pengeluaran();

      //TRANSAKSI PENGELUARAN
      $nama_barang = '';
      $stok_awal   = 0;
      $jumlah      = 0;

      //KARTU STOCK
      $no_bon = '0000';
      $masuk = 0;
      $pengguna = '';

      if(isset($_POST['submit'])){
        $no_transaksi           = $_POST['no_transaksi'];
        $keterangan_pengeluaran = $_POST['keterangan_pengeluaran'];
        $tanggal                = $_POST['tanggal'];
        $unit                   = $_POST['unit'];
        $jumlah                 = $_POST['jumlah'];
        $no_surat_pengambilan   = $_POST['no_surat_pengambilan'];
        $user                   = $_SESSION['username'];

        $kodedannama   = $_POST['nama_barang'];
        $hasil_explode = explode('|', $kodedannama);
        $nama_barang   = $hasil_explode[0];
        $kode_barang   = $hasil_explode[1];

        $showstokawal = stok_awal($nama_barang);

        while($awal = mysqli_fetch_assoc($showstokawal)){
          $stok_awal = $awal['stok'];
        }

        $stok_aktual = $stok_awal - $jumlah;

        if(!empty($tanggal) && !empty($unit) && !empty($nama_barang) && !empty($jumlah)){
          if(transaksi_barang_keluar($no_transaksi, $keterangan_pengeluaran, $tanggal, $unit, $kode_barang, $nama_barang, $jumlah, $no_surat_pengambilan, $user)){
            if(tambah_stok_barang($stok_aktual, $kode_barang)){
              echo "<script>"; 
              echo "alert('Transaksi pengeluaran barang berhasil!');"; 
              echo "window.location.href = 'laporan_pengeluaran.php';";
              echo "</script>";
            }else{
              echo "<script>alert('Transaksi gagal!');</script>";
            }
          }else{
            echo "<script>alert('Ada masalah ketika menambahkan data transaksi barang keluar!');</script>";
          }
        }else{
          echo "<script>alert('Data tidak boleh kosong!');</script>";
        }

        tambah_kartu_stock($nama_barang, $tanggal, $no_bon, $keterangan_penerimaan, $masuk, $jumlah, $stok_aktual, $unit);
 
      }

      ?>

      <main>

        <div class="row">
          <div class="col s12">
            <h4><b>TRANSAKSI PENGELUARAN BARANG</b></h4>
          </div>
        </div>

        <div class="row">
          <div class="col s12">
            <button class="btn waves-effect waves-light" onClick="tampilkan_listPenerimaan()">Daftar Pengeluaran
              <i class="material-icons left">keyboard_arrow_down</i>
            </button>
          </div>
        </div>

        <div class="row tampilkanListPenerimaan" style="display: none;">
          <div class="col s12">
            <table class="striped responsive-table">
              <thead>
                <tr>
                    <th>No</th>
                    <th>No Transaksi</th>
                    <th>No Surat Pengambilan</th>
                    <th>Ket. Pengeluaran</th>
                    <th>Tanggal</th>
                    <th>Penerima</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Petugas</th>
                </tr>
              </thead>

              <tbody>
                <?php while($row = mysqli_fetch_assoc($pengeluaran)):?>
                <tr>
                  <td><?=$nourut++;?></td>
                  <td><?=$row['no_transaksi'];?></td>
                  <td><?=$row['no_surat_pengambilan'];?></td>
                  <td><?=$row['keterangan'];?></td>
                  <td><?=date('d-m-Y', strtotime($row['tanggal']));?></td>
                  <td><?=$row['unit'];?></td>
                  <td><?=$row['barang'];?></td>
                  <td><?=$row['jumlah'];?></td>
                  <td><?=$row['petugas'];?></td>
                </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          </div>
        </div>

        <form action="" method="post">
          <div class="row">
            <div class="col s12">  
              <div class="input-field col s6">
                <label for="no_transaksi">No Transaksi</label>
                <input name="no_transaksi" type="text" class="validate">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">  
              <div class="input-field col s6">
                <label for="no_surat_pengambilan">No Surat Pengambilan</label>
                <input name="no_surat_pengambilan" type="text" class="validate">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="input-field col s6">
                <label for="keterangan_pengeluaran">Keterangan Pengeluaran</label>
                <input name="keterangan_pengeluaran" type="text" class="validate">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="input-field col s6">
                <label for="tanggal">Tanggal</label>
                <input name="tanggal" type="date" class="validate" id="tglSekarang">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="input-field col s6">
                <select name="unit" type="text" class="validate selek">
                  <option value="" disabled selected>Pilih Unit</option>
                  <?php while($row_unit = mysqli_fetch_assoc($tampilkan_unit)):?>
                  <option value="<?=$row_unit['nama'];?>"><?=$row_unit['nama'];?></option>
                  <?php endwhile; ?>
                </select>
                <label for="unit">Unit Penerima</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="input-field col s6">
                <select name="nama_barang" type="text" class="validate selek">
                  <option value="" disabled selected>Pilih Barang</option>
                  <?php while($row_barang = mysqli_fetch_assoc($barang)):?>
                  <option value="<?=$row_barang['nama'];?>|<?=$row_barang['kode'];?>"><?=$row_barang['kode'];?> | <?=$row_barang['nama'];?></option>
                  <?php endwhile; ?>
                </select>
                <label for="nama_barang">Barang</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="input-field col s6">
                <label for="jumlah">Jumlah</label>
                <input name="jumlah" type="number" class="validate">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <button class="btn waves-effect waves-light" type="submit" name="submit">Simpan
                <i class="material-icons left">send</i>
              </button>
              <button class="btn red waves-effect waves-light" type="reset">Batal
                <i class="material-icons left">clear</i>
              </button>
            </div>
          </div>
        </form>

      </main>

      <?php
      require_once "../aset/view/footer.php";
      require_once "../aset/view/footcontent.php";
      ?>
    </body>
  </html>