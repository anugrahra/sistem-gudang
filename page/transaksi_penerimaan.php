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
      $barang             = tampilkan_barang();
      $tampilkan_supplier = tampilkan_supplier();
      $nourut             = 1;
      $penerimaan         = tampilkan_penerimaan();

      //TRANSAKSI PENERIMAAN
      $nama_barang = '';
      $stok_awal   = 0;
      $jumlah      = 0;
      $nama_barang = '';

      //KARTU STOCK
      $no_bon = '0000';
      $keluar = 0;
      $pengguna = '';

      //STOCK OPNAME
      $saldo_awal = 0;

      if(isset($_POST['submit'])) {
        $keterangan_penerimaan = $_POST['keterangan_penerimaan'];
        $tanggal               = $_POST['tanggal'];
        $supplier              = $_POST['supplier'];
        $jumlah                = $_POST['jumlah'];
        $no_surat_jalan        = $_POST['no_surat_jalan'];
        $user                  = $_SESSION['username'];

        $kodedannama   = $_POST['nama_barang'];
        $hasil_explode = explode('|', $kodedannama);
        $nama_barang   = $hasil_explode[0];
        $kode_barang   = $hasil_explode[1];
        $satuan        = $hasil_explode[2];

        $showstokawal = stok_awal($nama_barang);

        while($awal = mysqli_fetch_assoc($showstokawal)){
          $stok_awal = $awal['stok'];
        }

        $stok_aktual = $stok_awal + $jumlah;

        if(!empty($keterangan_penerimaan) && !empty($tanggal) && !empty($supplier) && !empty($jumlah) && !empty($no_surat_jalan) && !empty($user) && !empty($nama_barang) && !empty($kode_barang) && !empty($satuan)){
          if(transaksi_barang_masuk($keterangan_penerimaan, $tanggal, $supplier, $kode_barang, $nama_barang, $jumlah, $user, $no_surat_jalan)){
            if(tambah_stok_barang($stok_aktual, $kode_barang)){
              if(tambah_kartu_stock($nama_barang, $tanggal, $kode_barang, $keterangan_penerimaan, $jumlah, $keluar, $stok_aktual, $pengguna)){
                if(mysqli_num_rows(cek_barang_opname($kode_barang, $tanggal)) > 0){
                  if(update_stok_opname_terima($saldo_awal, $jumlah, $stok_aktual, $kode_barang, $tanggal)){
                    echo "<script>";
                    echo "alert('Transaksi penerimaan barang berhasil!');"; 
                    echo "window.location.href = 'laporan_penerimaan.php';";
                    echo "</script>";
                  } else {
                    echo "<script>alert('Gagal update stock opname!');</script>";
                  }
                } else {
                  if(tambah_stok_opname($nama_barang, $kode_barang, $satuan, $saldo_awal, $jumlah, $keluar, $stok_aktual, $keterangan_penerimaan, $tanggal)){
                    echo "<script>";
                    echo "alert('Transaksi penerimaan barang berhasil!');"; 
                    echo "window.location.href = 'laporan_penerimaan.php';";
                    echo "</script>";
                  } else {
                    echo "<script>alert('Gagal menambahkan stock opname!');</script>";
                  }
                }
              } else {
                echo "<script>alert('Transaksi gagal!');</script>";
              }
            } else {
              echo "<script>alert('Ada masalah ketika menambahkan stok barang!');</script>";  
            }
          } else {
            echo "<script>alert('Ada masalah ketika menambahkan transaksi barang masuk!');</script>";
          }
        } else {
          echo "<script>alert('Data tidak boleh kosong!');</script>";
        }
      }

      ?>
      <main>

        <div class="row">
          <div class="col s12">
            <h4><b>TRANSAKSI PENERIMAAN BARANG</b></h4>
          </div>
        </div>

        <form action="" method="post" class="transaksiw">
          <div class="row">
            <div class="col s12">  
              <div class="input-field col s6">
                <label for="no_surat_jalan">No Surat Jalan</label>
                <input name="no_surat_jalan" type="text" class="validate">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="input-field col s6">
                <label for="keterangan_penerimaan">Keterangan Penerimaan</label>
                <input name="keterangan_penerimaan" type="text" class="validate">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="input-field col s6">
                <label for="tanggal">Tanggal</label>
                <input name="tanggal" type="date" class="validate" id="tglSekarang">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="input-field col s6">
                <select name="supplier" type="text" class="validate selek">
                  <option value="" disabled selected>Pilih Pemasok</option>
                  <?php while($row_supplier = mysqli_fetch_assoc($tampilkan_supplier)):?>
                  <option value="<?=$row_supplier['nama'];?>"><?=$row_supplier['kode'];?> | <?=$row_supplier['nama'];?></option>
                  <?php endwhile; ?>
                </select>
                <label for="supplier">Pemasok</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="input-field col s6">
                <select name="nama_barang" type="text" class="validate selek">
                  <option value="" disabled selected>Pilih Barang</option>
                  <?php while($row_barang = mysqli_fetch_assoc($barang)):?>
                  <option value="<?=$row_barang['nama'];?>|<?=$row_barang['kode'];?>|<?=$row_barang['satuan'];?>"><?=$row_barang['kode'];?> | <?=$row_barang['nama'];?></option>
                  <?php endwhile; ?>
                </select>
                <label for="nama_barang">Barang</label>
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
              <button class="btn waves-effect waves-light" type="submit" name="submit">Simpan
                <i class="material-icons left">send</i>
              </button>
              <button class="btn red waves-effect waves-light" type="reset">Batal
                <i class="material-icons left">clear</i>
              </button>
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