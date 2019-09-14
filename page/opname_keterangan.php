<!DOCTYPE html>
  <html>
    <head>
      <?php require_once "../aset/view/headcontent.php"; ?>
    </head>

    <body>
      <?php    
      ob_start();
      session_start();
      if($_SESSION['username'] !== 'Administrator') header('location:../index.php');

      require_once "../aset/view/header.php";
      require_once "../fungsi/db.php";
      require_once "../fungsi/fungsi.php";

      $error = '';

      //MENAMPILKAN DATA AWAL
      $id = $_GET['id'];
      if(isset($_GET['id'])){
        $opname = opname_per_id($id);
        while ($row = mysqli_fetch_assoc($opname)){
          $keterangan_awal   = $row['keterangan'];
        }
      }

      //SUBMIT DATA KE FUNGSI EDIT_DATA_BARANG
      if(isset($_POST['submit'])){
        
        $keterangan   = $_POST['keterangan'];

        //MENGIRIM DATA UPDATE BARANG KE DATABASE
        if(!empty($keterangan)){

          if(update_keterangan_opname($id, $keterangan)){
             header('location:stock_opname.php');
          }else{
            echo "<script>alert('Ada masalah ketika update keterangan!');</script>";
          }

        }else{
          echo "<script>alert('Data tidak boleh kosong!');</script>";
        }

      }
      ?>

      <main>
        <?=$error;?>
        <div class="row">
          <div class="col s12">
            <h4><div class="center"><b>INPUT KETERANGAN</b></div></h4>
          </div>
        </div>

        <form action="" method="post" class="z-depth-1">
          <div class="row">
            <div class="col s12">  
              <div class="input-field col s6">
                <label for="keterangan">Keterangan</label>
                <input name="keterangan" type="text" class="validate" value="<?=$keterangan_awal;?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <button class="btn waves-effect waves-light" type="submit" name="submit">Simpan
                <i class="material-icons left">check</i>
              </button>
              <a class="btn red lighten-1 waves-effect waves-light" href="stock_opname.php">Batal
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