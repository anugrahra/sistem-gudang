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
      $nourut = 1;
      $unit = tampilkan_unit();

      //SUBMIT DATA KE FUNGSI TAMBAH_UNIT
      if(isset($_POST['submit'])){
        $nama = $_POST['nama'];

        //MENGIRIM DATA SUPPLIER KE DATABASE
        if(!empty($nama)){
          if(tambah_unit($nama)){
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
            <h4><div class="center"><b>DAFTAR UNIT</b></div></h4>
          </div>
        </div>

        <div class="row">
          <div class="col s12">
            <button class="btn waves-effect waves-light" onClick="tampilkan_form()">Tambah Unit
              <i class="material-icons left">arrow_forward</i>
            </button>
          </div>
        </div>

        <form action="" method="post" class="tampilkanForm z-depth-1" style="display: none;">
          <div class="row">
            <div class="col s12">  
              <div class="input-field col s6">
                <label for="nama">Nama Unit</label>
                <input name="nama" type="text" class="validate">
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

        <div class="row">
          <div class="col s12">
            <table class="striped responsive-table">
              <thead>
                <tr>
                    <th>No</th>
                    <th>Unit</th>
                    <th></th>
                    <th></th>
                </tr>
              </thead>

              <tbody>
                <?php while($row = mysqli_fetch_assoc($unit)):?>
                <tr>
                  <td><?=$nourut++;?></td>
                  <td><?=$row['nama'];?></td>
                  <td><a href="edit_list_unit.php?id=<?=$row['id'];?>">Ubah</a></td>
                  <td><a href="hapus_unit.php?id=<?=$row['id'];?>" class="red-text" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</a></td>
                </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          </div>
        </div>

      </main>

      <?php
      require_once "../aset/view/footer.php";
      require_once "../aset/view/footcontent.php";
      ?>
    </body>
  </html>