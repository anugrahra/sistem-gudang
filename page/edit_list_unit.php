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
        $unit = unit_per_id($id);
        while ($row = mysqli_fetch_assoc($unit)){
          $nama_awal  = $row['nama'];
        }
      }

      //SUBMIT DATA KE FUNGSI EDIT_DATA_UNIT
      if(isset($_POST['submit'])){
        $nama = $_POST['nama'];

        //MENGIRIM DATA SUPPLIER KE DATABASE
        if(!empty($nama)){
          if(edit_data_unit($nama, $id)){
            header('location: list_unit.php');
          }else{
            echo "<script>alert('Ada masalah ketika menambah data unit!');</script>";
          }
        }else{
            echo "<script>alert('Data tidak boleh kosong!');</script>";
        }

      }

      ?>

      <main>

        <div class="row">
          <div class="col s12">
            <h4><center><b>EDIT DATA UNIT</b></center></h4>
          </div>
        </div>

        <form action="" method="post" class="z-depth-1">
          <div class="row">
            <div class="col s12">  
              <div class="input-field col s6">
                <label for="nama">Nama Unit</label>
                <input name="nama" type="text" class="validate" value="<?=$nama_awal;?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <button class="btn waves-effect waves-light" type="submit" name="submit">Simpan
                <i class="material-icons left">check</i>
              </button>
              <button class="btn red lighten-1 waves-effect waves-light" type="reset">Batal
                <i class="material-icons left">clear</i>
              </button>
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