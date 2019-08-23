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
      $error = '';

      //SETTING FUNGSI
      $jenis_barang = tampilkan_jenis_barang();
      $show_last_num_kode = show_last_num_kode();

      //MENAMPILKAN ISI NUM_KODE TERAKHIR
      while($last_num_kode = mysqli_fetch_assoc($show_last_num_kode)){
        $kode_terakhir = $last_num_kode['num_kode'];
      }

      //MENAMPILKAN DATA AWAL
      if(isset($_GET['id'])){
        $barang = barang_per_id($id);
        while ($row = mysqli_fetch_assoc($barang)){
          $kode_awal  = $row['kode'];
          $nama_awal  = $row['nama'];
          $stok_awal  = $row['stok'];
          $jenis_awal = $row['jenis'];
        }
      }

      //SUBMIT DATA KE FUNGSI EDIT_DATA_BARANG
      if(isset($_POST['submit'])){
        
        $nama  = $_POST['nama'];
        $stok  = $_POST['stok'];
        $jenis = $_POST['jenis'];

        //MENENTUKAN ALPHA_KODE JENIS BARANG
        if($jenis == 'AKSESORIS'){
          $alpha_kode = 'AC';
        }elseif($jenis == 'PERPIPAAN'){
          $alpha_kode = 'PP';
        }elseif($jenis == 'BAHAN KIMIA'){
          $alpha_kode = 'KM';
        }elseif ($jenis == 'ASET'){
          $alpha_kode = 'ST';
        }else{
          $alpha_kode = 'LL';
        }

        //MENENTUKAN NUM_KODE JENIS BARANG
        $num_kode = strval($kode_terakhir + 1);

        //MENENTUKAN SISIPAN 0 PADA KODE BARANG
        if(strlen($num_kode) == 2){
          $nol = '0';
        }elseif(strlen($num_kode) == 1) {
          $nol = '00';
        }else{
          $nol = '';
        }

        //MENENTUKAN KODE BARANG
        $kode = $alpha_kode.$nol.$num_kode;

        //MENGIRIM DATA UPDATE BARANG KE DATABASE
        if(!empty(trim($nama)) && !empty(trim($stok)) && !empty(trim($jenis))){

          if(edit_data_barang($kode, $nama, $stok, $jenis, $num_kode, $id)){
             header('location:list_barang.php');
          }else{
            echo "<script>alert('Ada masalah ketika mengedit data barang!');</script>";
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
            <h4><div class="center"><b>UBAH DATA BARANG</b></div></h4>
          </div>
        </div>

        <form action="" method="post" class="z-depth-1">
          <div class="row">
            <div class="col s12">  
              <div class="input-field col s6">
                <label for="nama">Nama Barang</label>
                <input name="nama" type="text" class="validate" value="<?=$nama_awal;?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="input-field col s6">
                <label for="stok">Stok Awal</label>
                <input name="stok" type="number" class="validate" value="<?=$stok_awal;?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="input-field col s6">
                <select name="jenis" type="text" class="validate selek">
                  <option value="" disabled selected>Pilih Jenis Barang</option>
                  <?php while($row_jenis = mysqli_fetch_assoc($jenis_barang)):?>
                  <option value="<?=$row_jenis['jenis'];?>"><?=$row_jenis['jenis'];?></option>
                  <?php endwhile; ?>
                </select>
                <label for="jenis">Jenis</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <button class="btn waves-effect waves-light" type="submit" name="submit">Simpan
                <i class="material-icons left">check</i>
              </button>
              <a class="btn red lighten-1 waves-effect waves-light" href="list_barang.php">Batal
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