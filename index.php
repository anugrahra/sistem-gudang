<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
  <link rel="stylesheet" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MASUK | ELANG - UPTD AIR MINUM KOTA CIMAHI</title>
</head>

<body id="bodylogin">
  <?php
  require_once "fungsi/db.php";
  require_once "fungsi/fungsi.php";

  ob_start();
  session_start();
  if(isset($_SESSION['username'])){
    header('location: page/home.php');
  }else{
    $eror='';
    if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

      if(!empty(trim($username) && !empty($password))){
        sistem_login($username, $password);
      }else{
        $eror = 'nama dan password harus diisi';
      }
    }
  }
  ?>

  <div class="section"></div>
  <main id="mainlogin">
    <div class="center">
      <div class="section"></div>

      <h5 class="indigo-text">E-FORM LAPORAN KELUAR MASUK BARANG</h5>
      <h6 class="indigo-text">UPTD AIR MINUM KOTA CIMAHI</h6>
      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

          <form class="col s12" method="post">
            <div class="row">
              <div class="col s12">
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <input type="text" name="username">
                <label for='username'>Nama Pengguna</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <input type="password" name="password">
                <label for="password">Kata Sandi</label>
              </div>
              <label style="float: right;">
                <span style="color: #F5F5F5"><b>Lupa Kata Sandi?</b></span>
              </label>
            </div>
            <div class="center">
              <div class="row">
                <button type="submit" name="submit" class="col s12 btn btn-large waves-effect indigo">Masuk</button>
              </div>
            </div>
            <br>
          </form>
        </div>
      </div>
      <p class="grey-text">&copy; 2019</p>
    </div>

    <div class="section"></div>
    <div class="section"></div>
  </main>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
  <script src="aset/js/script.js"></script>
</body>

  <?php
  mysqli_close($link);
  ob_end_flush();
  ?>

</html>