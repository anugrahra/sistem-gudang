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
          <div class="col s6">
            <button onClick="pemesanan()" style="padding: 5px;">
              <i class="material-icons large">add_shopping_cart</i>
              <p><b>Pemesanan Barang</b></p>
            </button>
          </div>
          <div class="col s6">
            <button href="" onClick="tampilkan_cariHome()" style="padding: 5px;">
              <i class="material-icons large">search</i>
              <p><b>Pencarian Barang</b></p>
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
      </main>

      <?php
      require_once "../aset/view/footer.php";
      require_once "../aset/view/footcontent.php";
      ?>
    </body>
  </html>