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

      //SETTING HALAMAN
      $per_page = 10;
      $page_now = 1;
      if(isset($_GET['page'])){
        $page_now = $_GET['page'];
        $page_now = ($page_now > 1) ? $page_now : 1;
      }
      $total_pengaduan = mysqli_num_rows(mysqli_query($link, "SELECT * FROM barang"));
      $page_total = ceil($total_pengaduan/$per_page);
      $awal = ($page_now - 1) * $per_page;
      $nourut = $page_now * 10 - 9;

      //SETTING FUNGSI
      $barang = tampilkan_barang_perhalaman();
      $jenis_barang = tampilkan_jenis_barang();
      $show_last_num_kode = show_last_num_kode();

      //MENAMPILKAN ISI NUM_KODE TERAKHIR
      while($last_num_kode = mysqli_fetch_assoc($show_last_num_kode)){
        $kode_terakhir = $last_num_kode['num_kode'];
      }

      //SUBMIT DATA KE FUNGSI TAMBAH_BARANG
      if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $qty  = $_POST['qty'];
        $jenis = $_POST['jenis'];
        $satuan = $_POST['satuan'];

        //MENENTUKAN ALPHA_KODE JENIS BARANG
        if($jenis == 'PERALATAN KERJA'){
          $alpha_kode = 'PK';
        }elseif($jenis == 'PERALATAN MESIN DAN LISTRIK'){
          $alpha_kode = 'ML';
        }elseif($jenis == 'BAHAN KIMIA'){
          $alpha_kode = 'KM';
        }elseif ($jenis == 'BAHAN BANGUNAN'){
          $alpha_kode = 'BN';
        }elseif ($jenis == 'MATERIAL'){
          $alpha_kode = 'MT';
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

        //MENGIRIM DATA BARANG KE DATABASE
        if(!empty($nama) && !empty($jenis) && !empty($satuan)){
          if(tambah_barang($nama, $qty, $jenis, $num_kode, $kode, $satuan)){
            header('location: list_barang.php');
          }else{
            echo "<script>alert('Ada masalah ketika menambah data barang!');</script>";
          }
        }else{
            echo "<script>alert('Data tidak boleh kosong!');</script>";
        }

      }

      //CARI BARANG
      if(isset($_GET['cari_barang'])){
        $cari_barang = $_GET['cari_barang'];
        $barang      = hasil_cari_barang($cari_barang);
      }
      ?>

      <main>

        <div class="row center">
          <div class="col s12">
            <h4><b>DAFTAR BARANG</b></h4>
          </div>
        </div>

        <div class="row">
          <div class="col s12">
            <button class="btn waves-effect waves-light" onClick="tampilkan_cari()">Cari Barang
              <i class="material-icons left">search</i>
            </button>
            <button class="btn waves-effect waves-light" onClick="tampilkan_form()">Tambah Barang
              <i class="material-icons left">arrow_forward</i>
            </button>
          </div>
        </div>

        <form action="" method="get" class="tampilkanCari z-depth-1" style="display: none;">
          <div class="row">
            <div class="col s12">  
              <div class="input-field col s6">
                <i class="material-icons prefix">search</i>
                <input name="cari_barang" type="search" class="validate">
                <span class="helper-text" data-error="gagal" data-success="mencari...">Ketik, lalu tekan enter</span>
              </div>              
            </div>
          </div>        
        </form>

        <form action="" method="post" class="tampilkanForm z-depth-1" style="display: none;">
          <div class="row">
            <div class="col s12">  
              <div class="input-field col s6">
                <label for="nama">Nama Barang</label>
                <input name="nama" type="text" class="validate">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="input-field col s6">
                <label for="qty">Stok Awal</label>
                <input name="qty" type="number" class="validate">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="input-field col s6">
                <label for="satuan">Satuan</label>
                <input name="satuan" type="text" class="validate">
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
                  <th>Kode</th>
                  <th>Nama</th>
                  <th>Stok</th>
                  <th>Satuan</th>
                  <th>Jenis</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                <?php while($row = mysqli_fetch_assoc($barang)):?>
                <tr>
                  <td><?=$nourut++;?></td>
                  <td><?=$row['kode'];?></td>
                  <td><a href="kartu_stock.php?kode=<?=$row['kode'];?>"><?=$row['nama'];?></a></td>
                  <td><?=$row['stok'];?></td>
                  <td><?=$row['satuan'];?></td>
                  <td><?=$row['jenis'];?></td>
                  <td><a href="edit_list_barang.php?id=<?=$row['id'];?>">Ubah</a></td>
                  <td><a href="hapus_barang.php?id=<?=$row['id'];?>" class="red-text" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</a></td>
                </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="row center">
          <div class="col s12">
            <?php if(isset($page_total)) { ?>
              <?php if($page_total > 1) { ?>
                <?php if($page_now > 1) {?>
                  <div class="center">
                    <a href="list_barang.php?page=<?php echo $page_now - 1 ?>" role="button" class="btn btn-info">&lt; Sebelumnya</a>
                  </div>
                    <?php }else{ ?>
                      <a href="" style="display: none;">Hilang</a>
                    <?php } ?>
                    <?php if($page_now < $page_total) { ?>
                      <div class="center">
                        <a href="list_barang.php?page=<?php echo $page_now + 1 ?>" role="button" class="btn btn-info">Selanjutnya &gt;</a>
                      </div>
                    <?php }else{ ?>
                      <a href="" style="display: none;">Hilang</a>
                    <?php } ?>
                  </ul>
                </nav>
              <?php } ?>
            <?php } ?>
          </div>
        </div>

      </main>

      <?php
      require_once "../aset/view/footer.php";
      require_once "../aset/view/footcontent.php";
      ?>
    </body>
  </html>