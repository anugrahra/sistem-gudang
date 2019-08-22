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

      //SETTING FUNGSI
      $show_last_num_kode = show_last_num_kode_supplier();

      //MENAMPILKAN ISI NUM_KODE TERAKHIR
      while($last_num_kode = mysqli_fetch_assoc($show_last_num_kode)){
        $kode_terakhir = $last_num_kode['num_kode'];
      }

      //MENAMPILKAN DATA AWAL
      if(isset($_GET['id'])){
        $supplier = supplier_per_id($id);
        while ($row = mysqli_fetch_assoc($supplier)){
          $nama_awal       = $row['nama'];
          $alamat_awal     = $row['alamat'];
          $no_kontak_awal  = $row['no_kontak'];
          $email_awal      = $row['email'];
        }
      }

      //SUBMIT DATA KE FUNGSI EDIT_DATA_SUPPLIER
      if(isset($_POST['submit'])){
        $nama       = $_POST['nama'];
        $alpha_kode = $_POST['alpha_kode'];
        $alamat     = $_POST['alamat'];
        $no_kontak  = $_POST['telp'];
        $email      = $_POST['email'];

        //MENENTUKAN NUM_KODE SUPPLIER
        $num_kode = strval($kode_terakhir + 1);

        //MENENTUKAN SISIPAN 0 PADA KODE SUPPLIER
        if(strlen($num_kode) == 2){
          $nol = '0';
        }elseif(strlen($num_kode) == 1) {
          $nol = '00';
        }else{
          $nol = '';
        }

        //MENENTUKAN KODE SUPPLIER
        $kode = $alpha_kode.$nol.$num_kode;

        //MENGIRIM DATA SUPPLIER KE DATABASE
        if(!empty($nama) && !empty($alpha_kode) && !empty($alamat) && !empty($no_kontak) && !empty($email)){
          if(edit_data_supplier($kode, $nama, $alamat, $no_kontak, $email, $num_kode, $id)){
            header('location: list_supplier.php');
          }else{
            echo "<script>alert('Ada masalah ketika mengedit data supplier!');</script>";
          }
        }else{
            echo "<script>alert('Data tidak boleh kosong!');</script>";
        }

      }
      ?>

      <main>

        <div class="row">
          <div class="col s12">
            <h4><div class="center"><b>EDIT DATA SUPPLIER</b></div></h4>
          </div>
        </div>

        <form action="" method="post" class="tampilkanForm z-depth-1">
          <div class="row">
            <div class="col s12">  
              <div class="input-field col s6">
                <label for="nama">Nama</label>
                <input name="nama" type="text" class="validate" value="<?=$nama_awal;?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">  
              <div class="input-field col s6">
                <label for="alpha_kode">Alpha Kode</label>
                <input name="alpha_kode" type="text" class="validate" placeholder="Contoh: SM (untuk CV. SUMBER MAKMUR)">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="input-field col s6">
                <label for="alamat">Alamat</label>
                <input name="alamat" type="text" class="validate" value="<?=$alamat_awal;?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="input-field col s6">
                <label for="telp">Telp/HP</label>
                <input name="telp" type="text" class="validate" value="<?=$no_kontak_awal;?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="input-field col s6">
                <label for="email">Email</label>
                <input name="email" type="email" class="validate" value="<?=$email_awal;?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <button class="btn waves-effect waves-light" type="submit" name="submit">Simpan
                <i class="material-icons left">check</i>
              </button>
              <a class="btn red lighten-1 waves-effect waves-light" href="list_supplier.php">Batal
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