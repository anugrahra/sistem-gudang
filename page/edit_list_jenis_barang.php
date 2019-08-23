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

      $id = $_GET['id'];

      //MENAMPILKAN DATA AWAL
      if(isset($_GET['id'])){
        $jenis_barang = jenis_barang_per_id($id);
        while ($row = mysqli_fetch_assoc($jenis_barang)){
          $jenis_awal      = $row['jenis'];
          $alpha_kode_awal = $row['alpha_kode'];
        }
      }

      //SUBMIT DATA KE FUNGSI EDIT_DATA_JENIS_BARANG
      if(isset($_POST['submit'])){
        $jenis      = $_POST['jenis'];
        $alpha_kode = $_POST['alpha_kode'];

        //MENGIRIM DATA JENIS BARANG KE DATABASE
        if(!empty($jenis) && !empty($alpha_kode)){
          if(edit_data_jenis_barang($jenis, $alpha_kode, $id)){
            header('location: list_jenis_barang.php');
          }else{
            echo "<script>alert('Ada masalah ketika mengedit data jenis barang!');</script>";
          }
        }else{
            echo "<script>alert('Data tidak boleh kosong!');</script>";
        }

      }
      ?>

      <main>

        <div class="row">
          <div class="col s12">
            <h4><div class="center"><b>UBAH DATA JENIS BARANG</b></div></h4>
          </div>
        </div>

        <form action="" method="post" class="z-depth-1">
          <div class="row">
            <div class="col s12">  
              <div class="input-field col s6">
                <label for="jenis">Jenis Barang</label>
                <input name="jenis" type="text" class="validate" value="<?=$jenis_awal;?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="input-field col s6">
                <label for="alpha_kode">Kode Alfa</label>
                <input name="alpha_kode" type="text" class="validate" value="<?=$alpha_kode_awal;?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <button class="btn waves-effect waves-light" type="submit" name="submit">Simpan
                <i class="material-icons left">check</i>
              </button>
              <a class="btn red lighten-1 waves-effect waves-light" href="list_jenis_barang.php">Batal
                <i class="material-icons left">clear</i>
              </a>
            </div>
          </div>
          <br>
        </form>

      </main>

      <?php
      require_once "../aset/view/footer.php";
      require_once "../aset/view/footcontent.php";
      ?>
    </body>
  </html>