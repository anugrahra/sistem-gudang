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
      $supplier = tampilkan_supplier();
      $show_last_num_kode = show_last_num_kode_supplier();

      //MENAMPILKAN ISI NUM_KODE TERAKHIR
      while($last_num_kode = mysqli_fetch_assoc($show_last_num_kode)){
        $kode_terakhir = $last_num_kode['num_kode'];
      }

      //SUBMIT DATA KE FUNGSI TAMBAH_SUPPLIER
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
        if(!empty($nama) && !empty($alpha_kode)){
          if(tambah_supplier($kode, $nama, $alamat, $no_kontak, $email, $num_kode)){
            header('location: list_supplier.php');
          }else{
            echo "<script>alert('Ada masalah ketika menambah data supplier!');</script>";
          }
        }else{
            echo "<script>alert('Data tidak boleh kosong!');</script>";
        }

      }

      //CARI SUPPLIER
      if(isset($_GET['cari_supplier'])){
        $cari_supplier = $_GET['cari_supplier'];
        $supplier      = hasil_cari_supplier($cari_supplier);
      }

      ?>

      <main>

        <div class="row">
          <div class="col s12">
            <h4><div class="center"><b>DAFTAR PEMASOK</b></div></h4>
          </div>
        </div>

        <div class="row">
          <div class="col s12">
            <button class="btn waves-effect waves-light" onClick="tampilkan_cari()">Cari Pemasok
              <i class="material-icons left">search</i>
            </button>
            <button class="btn waves-effect waves-light" onClick="tampilkan_form()">Tambah Pemasok
              <i class="material-icons left">arrow_forward</i>
            </button>
          </div>
        </div>

        <form action="" method="get" class="tampilkanCari z-depth-1" style="display: none;">
          <div class="row">
            <div class="col s12">  
              <div class="input-field col s6">
                <i class="material-icons prefix">search</i>
                <input name="cari_supplier" type="search" class="validate">
                <span class="helper-text" data-error="gagal" data-success="mencari...">Ketik, lalu tekan enter</span>
              </div>              
            </div>
          </div>        
        </form>

        <form action="" method="post" class="tampilkanForm z-depth-1" style="display: none;">
          <div class="row">
            <div class="col s12">  
              <div class="input-field col s6">
                <label for="nama">Nama</label>
                <input name="nama" type="text" class="validate">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">  
              <div class="input-field col s6">
                <label for="alpha_kode">Kode Alpha</label>
                <input name="alpha_kode" type="text" class="validate" placeholder="Contoh: SM (untuk CV. SUMBER MAKMUR)">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="input-field col s6">
                <label for="alamat">Alamat</label>
                <input name="alamat" type="text" class="validate">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="input-field col s6">
                <label for="telp">Telp/HP</label>
                <input name="telp" type="text" class="validate">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="input-field col s6">
                <label for="email">Email</label>
                <input name="email" type="email" class="validate">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <button class="btn waves-effect waves-light" type="submit" name="submit">Simpan
                <i class="material-icons left">check</i>
              </button>
              <button class="btn red lighten-1 waves-effect waves-light" onClick="tampilkan_form()">Batal
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
                    <th>Kode</th>
                    <th>Pemasok</th>
                    <th>Alamat</th>
                    <th>Telp</th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                </tr>
              </thead>

              <tbody>
                <?php
                while($row = mysqli_fetch_assoc($supplier)):

								$sembunyi = '';
                
                if ($row['kode'] === 'SW000') {
                  $sembunyi = 'none';
                }else{
                  $sembunyi = '';
                }
                
                ?>
                <tr>
                  <td><?=$nourut++;?></td>
                  <td><?=$row['kode'];?></td>
                  <td><?=$row['nama'];?></td>
                  <td><?=$row['alamat'];?></td>
                  <td><?=$row['no_kontak'];?></td>
                  <td><?=$row['email'];?></td>
                  <td><a href="edit_list_supplier.php?id=<?=$row['id'];?>" style="display: <?=$sembunyi;?>;">Edit</a></td>
                  <td><a href="hapus_supplier.php?id=<?=$row['id'];?>" class="red-text" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" style="display: <?=$sembunyi;?>;">Hapus</a></td>
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