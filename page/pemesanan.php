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
      $tampilkan_unit     = tampilkan_unit();
      $nourut             = 1;

      if(isset($_POST['submit'])){
        $no_order     = $_POST['no_order'];
        $nama_pemesan = $_POST['nama_pemesan'];
        $unit         = $_POST['unit'];
        $nama_barang  = $_POST['nama_barang'];
        $jumlah       = $_POST['jumlah'];
        $keterangan   = $_POST['keterangan'];

        if(!empty($no_order) && !empty($nama_pemesan) && !empty($nama_barang) && !empty($jumlah)){
          
          if(transaksi_pemesanan($no_order, $nama_pemesan, $unit, $nama_barang, $jumlah, $keterangan)){
              echo "<script>"; 
              echo "alert('Pemesanan barang berhasil!');"; 
              echo "window.location.href = 'laporan_pemesanan.php';";
              echo "</script>";
            }else{
              echo "<script>alert('Transaksi gagal!');</script>";
            }

        }else{
          echo "<script>alert('Data tidak boleh kosong!');</script>";
        }
        
      }
      ?>
      <main>

        <div class="row">
          <div class="col s12">
            <h4><b>PEMESANAN BARANG</b></h4>
          </div>
        </div>

        <form action="" method="post">
          <div class="row">
            <div class="col s12">  
              <div class="input-field col s6">
                <label for="no_order">No Order</label>
                <input name="no_order" type="text" class="validate">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">  
              <div class="input-field col s6">
                <label for="nama_pemesan">Nama Pemesan</label>
                <input name="nama_pemesan" type="text" class="validate">
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
                <label for="supplier">Unit</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="input-field col s6">
                <label for="nama_barang">Nama Barang</label>
                <input name="nama_barang" type="text" class="validate">
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
                <label for="keterangan">Keterangan</label>
                <input name="keterangan" type="text" class="validate">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <button class="btn waves-effect waves-light" type="submit" name="submit">Pesan
                <i class="material-icons left">send</i>
              </button>
              <a class="btn red waves-effect waves-light" href="home.php">Batal
                <i class="material-icons left">clear</i>
              </a>
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