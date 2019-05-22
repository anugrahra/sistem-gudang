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

      $nama_barang = '';
      $stok_awal   = 0;
      $jumlah      = 0;
      $nama_barang = '';

      if(isset($_POST['submit'])){
        $no_transaksi           = $_POST['no_transaksi'];
        $keterangan_pengeluaran = $_POST['keterangan_pengeluaran'];
        $tanggal                = $_POST['tanggal'];
        $unit                   = $_POST['unit'];
        $nama_barang            = $_POST['nama_barang'];
        $jumlah                 = $_POST['jumlah'];
        $user                   = $_SESSION['username'];

        $showstokawal = stok_awal($nama_barang);

        while($awal = mysqli_fetch_assoc($showstokawal)){
          $stok_awal = $awal['stok'];
        }

        $stok_aktual = $stok_awal - $jumlah;

        if(!empty($tanggal) && !empty($unit) && !empty($nama_barang) && !empty($jumlah)){
          if(transaksi_barang_keluar($no_transaksi, $keterangan_pengeluaran, $tanggal, $unit, $nama_barang, $jumlah, $user)){
            if(tambah_stok_barang($stok_aktual, $nama_barang)){
              echo "<script>alert('Transaksi pengeluaran barang berhasil!');</script>";
            }else{
              echo "<script>alert('Transaksi gagal!');</script>";
            }
          }else{
            echo "<script>alert('Ada masalah ketika menambahkan data transaksi barang keluar!');</script>";
          }
        }else{
          echo "<script>alert('Data tidak boleh kosong!');</script>";
        }
 
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
            <button class="btn waves-effect waves-light" onClick="tampilkan_listPenerimaan()">List Pengeluaran
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
                  <option value="<?=$row_barang['nama'];?>"><?=$row_barang['kode'];?> | <?=$row_barang['nama'];?></option>
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