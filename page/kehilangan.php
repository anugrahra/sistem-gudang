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
      $nourut             = 1;
      $kehilangan         = tampilkan_kehilangan();

      $nama_barang = '';
      $stok_awal   = 0;
      $jumlah      = 0;
      $nama_barang = '';

      if(isset($_POST['submit'])){
        $tanggal                = $_POST['tanggal'];
        $jumlah                 = $_POST['jumlah'];
        $keterangan             = $_POST['keterangan'];
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

        if(!empty($tanggal) && !empty($nama_barang) && !empty($jumlah)){
          if(transaksi_barang_hilang($tanggal, $kode_barang, $nama_barang, $jumlah, $keterangan, $user)){
            if(tambah_stok_barang($stok_aktual, $kode_barang)){
              echo "<script>alert('Stok barang telah dikurangi karena hilang!');</script>";
            }else{
              echo "<script>alert('Gagal!');</script>";
            }
          }else{
            echo "<script>alert('Ada masalah ketika menambahkan data kehilangan barang!');</script>";
          }
        }else{
          echo "<script>alert('Data tidak boleh kosong!');</script>";
        }
 
      }

      ?>

      <main>

        <div class="row">
          <div class="col s12">
            <h4><b>KEHILANGAN BARANG</b></h4>
          </div>
        </div>

        <div class="row">
          <div class="col s12">
            <button class="btn waves-effect waves-light" onClick="tampilkan_listPenerimaan()">List Kehilangan Barang
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
                    <th>Tanggal</th>
                    <th>Barang</th>
                    <th>Jumlah Kehilangan</th>
                    <th>Keterangan</th>
                    <th>Pelapor</th>
                </tr>
              </thead>

              <tbody>
                <?php while($row = mysqli_fetch_assoc($kehilangan)):?>
                <tr>
                  <td><?=$nourut++;?></td>
                  <td><?=date('d-m-Y', strtotime($row['tanggal']));?></td>
                  <td><?=$row['barang'];?></td>
                  <td><?=$row['jumlah'];?></td>
                  <td><?=$row['keterangan'];?></td>
                  <td><?=$row['pelapor'];?></td>
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
                <label for="tanggal">Tanggal</label>
                <input name="tanggal" type="date" class="validate" id="tglSekarang">
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
              <div class="input-field col s6">
                <label for="keterangan">Keterangan Kehilangan</label>
                <input name="keterangan" type="text" class="validate">
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