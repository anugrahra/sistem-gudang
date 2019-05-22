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
        <center>
          <h1>Selamat Datang, <b><?=$_SESSION['username'];?></b>! ;)</h1>
        </center>
      </main>

      <?php
      require_once "../aset/view/footer.php";
      require_once "../aset/view/footcontent.php";
      ?>
    </body>
  </html>