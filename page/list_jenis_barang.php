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
      $jenis_barang = tampilkan_jenis_barang();
      $nourut = 1;

      //SUBMIT DATA KE FUNGSI TAMBAH_JENIS_BARANG
      if(isset($_POST['submit'])){
        $jenis      = $_POST['jenis'];
        $alpha_kode = $_POST['alpha_kode'];

        //MENGIRIM DATA BARANG KE DATABASE
        if(!empty($jenis) && !empty($alpha_kode)){
          if(tambah_jenis_barang($jenis, $alpha_kode)){
            header('location: list_jenis_barang.php');
          }else{
            echo "<script>alert('Ada masalah ketika menambah data jenis barang!');</script>";
          }
        }else{
            echo "<script>alert('Data tidak boleh kosong!');</script>";
        }

      }
      ?>

      <main>

        <div class="row">
          <div class="col s12">
            <h4><center><b>LIST JENIS BARANG</b></center></h4>
          </div>
        </div>

        <div class="row">
          <div class="col s12">
            <button class="btn waves-effect waves-light" onClick="tampilkan_form()">Tambah Jenis Barang
              <i class="material-icons left">arrow_forward</i>
            </button>
          </div>
        </div>

        <form action="" method="post" class="tampilkanForm z-depth-1" style="display: none;">
          <div class="row">
            <div class="col s12">  
              <div class="input-field col s6">
                <label for="jenis">Jenis Barang</label>
                <input name="jenis" type="text" class="validate">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="input-field col s6">
                <label for="alpha_kode">Alpha Code</label>
                <input name="alpha_kode" type="text" class="validate">
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
                    <th>Jenis Barang</th>
                    <th>Alpha Code</th>
                    <th></th>
                    <th></th>
                </tr>
              </thead>

              <tbody>
                <?php while($row = mysqli_fetch_assoc($jenis_barang)):?>
                <tr>
                  <td><?=$nourut++;?></td>
                  <td><?=$row['jenis'];?></td>
                  <td><?=$row['alpha_kode'];?></td>
                  <td><a href="edit_list_jenis_barang.php?id=<?=$row['id'];?>">Edit</a></td>
                  <td><a href="hapus_jenis_barang.php?id=<?=$row['id'];?>" class="red-text" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</a></td>
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