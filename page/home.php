<!DOCTYPE html>
  <html>
    <head>
      <?php require_once "../aset/view/headcontent.php"; ?>
    </head>

    <body class="grey lighten-3">
      <?php    
      ob_start();
      session_start();
      if(!isset($_SESSION['username'])) header('location:../index.php');

      require_once "../aset/view/header.php";
      ?>

      <main>
        <div class="row center" style="margin-bottom: 80px;">
          <h4>Selamat Datang, <b><?=$_SESSION['username'];?></b>.</h4>
        </div>
        <div class="row center">
          <div class="col s4">
            <button href="" onClick="tampilkan_pemesanan()" style="padding: 5px;">
              <i class="material-icons large">add_shopping_cart</i>
              <p><b>Pemesanan Barang</b></p>
            </button>
          </div>
          <div class="col s4">
            <button href="" onClick="tampilkan_cariHome()" style="padding: 5px;">
              <i class="material-icons large">search</i>
              <p><b>Pencarian Barang</b></p>
            </button>
          </div>
          <div class="col s4">
            <button href=""  onClick="tampilkan_pilihLaporan()" style="padding: 5px;">
              <i class="material-icons large">reorder</i>
              <p><b>Laporan Barang</b></p>
            </button>
          </div>
        </div>

        <form action="list_barang.php" method="get" class="tampilkanCariHome z-depth-1" style="display: none;">
          <div class="row">
            <div class="col s12">  
              <div class="input-field col s6">
                <i class="material-icons prefix">search</i>
                <input name="cari_barang" type="search" class="validate">
                <span class="helper-text" data-error="gagal" data-success="mencari...">Ketik, lalu tekan enter ↵</span>
              </div>
            </div>
          </div>
        </form>

        <form action="" method="get" class="tampilkanPemesanan z-depth-1" style="display: none;">
          <b>Pemesanan Barang</b>
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
                <label for="qty">Kuantitas</label>
                <input name="qty" type="number" class="validate">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="input-field col s6">
                <label for="qty">Spesifikasi</label>
                <input name="qty" type="text" class="validate">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <button class="btn waves-effect waves-light" type="submit" name="submitPesanBarang">Kirim
                <i class="material-icons left">send</i>
              </button>
              <button class="btn red lighten-1 waves-effect waves-light" type="reset" onClick="tampilkan_pemesanan();">Batal
                <i class="material-icons left">clear</i>
              </button>
            </div>
          </div>
          <br>
        </form>

        <form action="" method="get" class="tampilkanPilihLaporan z-depth-1" style="display: none;">
          <div class="row">
            <div class="col s12">  
              <div class="input-field col s12">
                
              </div>              
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