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
      $tampilkan_unit     = tampilkan_unit();
      $nourut             = 1;
      $pengeluaran        = tampilkan_pengeluaran();

      //TRANSAKSI PENGELUARAN
      $nama_barang = '';
      $stok_awal   = 0;
      $jumlah      = 0;

      //KARTU STOCK
      $no_bon = '0000';
      $masuk = 0;
      $pengguna = '';

      //STOCK OPNAME
      $saldo_awal = 0;

      if(isset($_POST['submit'])){
        $keterangan_pengeluaran = $_POST['keterangan_pengeluaran'];
        $tanggal                = $_POST['tanggal'];
        $unit                   = $_POST['unit'];
        $jumlah                 = $_POST['jumlah'];
        $no_surat_pengambilan   = $_POST['no_surat_pengambilan'];
        $penerima               = $_POST['penerima'];

        $kodedannama   = $_POST['nama_barang'];
        $hasil_explode = explode('|', $kodedannama);
        $nama_barang   = $hasil_explode[0];
        $kode_barang   = $hasil_explode[1];
        $satuan        = $hasil_explode[2];

        $showstokawal = stok_awal($nama_barang);

        while($awal = mysqli_fetch_assoc($showstokawal)){
          $stok_awal = $awal['stok'];
        }

        $stok_aktual = $stok_awal - $jumlah;

        if(!empty($keterangan_pengeluaran) && !empty($tanggal) && !empty($unit) && !empty($jumlah) && !empty($no_surat_pengambilan) && !empty($penerima) && !empty($nama_barang) && !empty($kode_barang) && !empty($satuan) && !empty($stok_aktual)){
          if(transaksi_barang_keluar($keterangan_pengeluaran, $tanggal, $unit, $penerima, $kode_barang, $nama_barang, $jumlah, $no_surat_pengambilan, $satuan)){
            if(tambah_stok_barang($stok_aktual, $kode_barang)){
              if(tambah_kartu_stock($nama_barang, $kode_barang, $tanggal, $kode_barang, $keterangan_pengeluaran, $masuk, $jumlah, $stok_aktual, $unit)){
                if(mysqli_num_rows(cek_barang_opname($kode_barang, $tanggal)) > 0){
                  if(update_stok_opname_keluar($saldo_awal, $jumlah, $stok_aktual, $kode_barang, $tanggal)){
                    echo "<script>";
                    echo "alert('Transaksi penerimaan barang berhasil!');"; 
                    echo "window.location.href = 'laporan_penerimaan.php';";
                    echo "</script>";  
                  } else {
                    echo "<script>alert('Gagal update stock opname!');</script>";  
                  }
                } else {
                  if(tambah_stok_opname($nama_barang, $kode_barang, $satuan, $saldo_awal, $masuk, $jumlah, $stok_aktual, $keterangan_pengeluaran, $tanggal)){
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
              echo "<script>alert('Ada masalah ketika mengeluarkan stok barang!');</script>";  
            }
          } else {
            echo "<script>alert('Ada masalah ketika menambahkan transaksi barang keluar!');</script>";
          }
        } else {
          echo "<script>alert('Data tidak boleh kosong!');</script>";
        }
      }
      ?>

      <main>

        <div class="row center">
          <div class="col s12">
            <h4><b>TRANSAKSI PENGELUARAN BARANG</b></h4>
          </div>
        </div>

        <div class="row">
        <form action="" method="post" class="col s12 z-depth-5">
            
              <div class="input-field col s6">
                <label for="no_surat_pengambilan">No Surat Pengambilan</label>
                <input name="no_surat_pengambilan" type="text" class="validate">
              </div>
            
              <div class="input-field col s6">
                <label for="tanggal">Tanggal</label>
                <input name="tanggal" type="date" class="validate" id="tglSekarang">
              </div>
            
              <div class="input-field col s6">
                <label for="penerima">Pengambil Barang</label>
                <input name="penerima" type="text" class="validate">
              </div>
            
              <div class="input-field col s6">
                <select name="unit" type="text" class="validate selek">
                  <option value="" disabled selected>Pilih Bagian</option>
                  <?php while($row_unit = mysqli_fetch_assoc($tampilkan_unit)):?>
                  <option value="<?=$row_unit['nama'];?>"><?=$row_unit['nama'];?></option>
                  <?php endwhile; ?>
                </select>
                <label for="unit">Bagian</label>
              </div>
            
              <div class="input-field col s6">
                <select name="nama_barang" type="text" class="validate selek">
                  <option value="" disabled selected>Pilih Barang</option>
                  <?php while($row_barang = mysqli_fetch_assoc($barang)):?>
                  <option value="<?=$row_barang['nama'];?>|<?=$row_barang['kode'];?>|<?=$row_barang['satuan'];?>"><?=$row_barang['kode'];?> | <?=$row_barang['nama'];?></option>
                  <?php endwhile; ?>
                </select>
                <label for="nama_barang">Nama Barang</label>
              </div>
            
              <div class="input-field col s6">
                <label for="jumlah">Jumlah</label>
                <input name="jumlah" type="number" class="validate">
              </div>
            
              <div class="input-field col s6">
                <label for="keterangan_pengeluaran">Keterangan Pengeluaran</label>
                <input name="keterangan_pengeluaran" type="text" class="validate">
              </div>

            <div class="col s6">    
              <button class="btn waves-effect waves-light" type="submit" name="submit">Simpan
                <i class="material-icons left">send</i>
              </button>
            </div>
        </form>
        </div>
      </main>

      <?php
      require_once "../aset/view/footer.php";
      require_once "../aset/view/footcontent.php";
      ?>
    </body>
  </html>