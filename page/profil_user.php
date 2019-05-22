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

      ?>

      <main>

        <div class="row">
          <div class="col s12">
            <h4><center><b><?=$_SESSION['username'];?></b></center></h4>
          </div>
        </div>

        <div class="row">
          <div class="col s12">
            <table class="striped responsive-table">
              <thead>
                <tr>
                    <th>Nama</th>
                    <th>Scope</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td><?=$_SESSION['username'];?></td>
                  <?php
                    if($_SESSION['level'] == 1){
                      $level = 'Super Admin';
                    }else{
                      $level = 'Regular Admin';
                    }
                  ;?>
                  <td><?=$level;?></td>
                </tr>
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