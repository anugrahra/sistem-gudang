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

      use PHPMailer\PHPMailer\PHPMailer;
      use PHPMailer\PHPMailer\Exception;

      require_once "../aset/view/header.php";
      require_once "../fungsi/db.php";
      require_once "../fungsi/fungsi.php";

      require '../vendor/phpmailer/src/Exception.php';
      require '../vendor/phpmailer/src/PHPMailer.php';
      require '../vendor/phpmailer/src/SMTP.php';

      //SETTING FUNGSI
      $tampilkan_unit     = tampilkan_unit();
      $nourut             = 1;

      if(isset($_POST['submit'])){
        $no_order     = $_POST['no_order'];
        $nama_pemesan = $_POST['nama_pemesan'];
        $unit         = $_POST['unit'];
        $nama_barang  = $_POST['nama_barang'];
        $jumlah       = $_POST['jumlah'];
        $keterangan   = $_POST['keterangan'];

        if(!empty($no_order) && !empty($nama_pemesan) && !empty($nama_barang) && !empty($jumlah)){
          
          if(transaksi_pemesanan($no_order, $nama_pemesan, $unit, $nama_barang, $jumlah, $keterangan)){
              echo "<script>"; 
              echo "alert('Pemesanan barang berhasil!');"; 
              echo "window.location.href = 'laporan_pemesanan.php';";
              echo "</script>";
            }else{
              echo "<script>alert('Transaksi gagal!');</script>";
            }

        }else{
          echo "<script>alert('Data tidak boleh kosong!');</script>";
        }

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'ssl://smtp.googlemail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'elang.uptdam@gmail.com';
            $mail->Password   = 'emailelanguptam999';
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;

            //Recipients
            $mail->setFrom('elang.uptdam@gmail.com', 'Elang UPTD AM Kota Cimahi');
            $mail->addAddress('dialog.anugrah@gmail.com');     // Add a recipient
            $mail->addReplyTo('elang.uptdam@gmail.com', 'Elang');

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Pemesanan Barang';
            $mail->Body    = '<div style="background-color:#2196F3; color: white;"><h1><center>Pemesanan Barang</center></h1></div>
            <b>No Order:</b> ' . $no_order . '<br>
            <b>Nama Pemesan:</b> ' . $nama_pemesan . '<br>
            <b>Unit:</b> ' . $unit . '<br>
            <b>Pesanan:</b> ' . $nama_barang . '<br>
            <b>Jumlah:</b> ' . $jumlah . '<br>
            <b>Keterangan:</b> ' . $keterangan . '
            <div style="background-color:black; color: white;"><center>ELANG © UPTD AIR MINUM KOTA CIMAHI 2019</center></div>';
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Pemesanan telah dikirim!';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        

      }
      ?>
      <main>

        <div class="row">
          <div class="col s12">
            <h4><b>PEMESANAN BARANG</b></h4>
          </div>
        </div>

        <form action="" method="post">
          <div class="row">
            <div class="col s12">  
              <div class="input-field col s6">
                <label for="no_order">No Order</label>
                <input name="no_order" type="text" class="validate">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">  
              <div class="input-field col s6">
                <label for="nama_pemesan">Nama Pemesan</label>
                <input name="nama_pemesan" type="text" class="validate">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="input-field col s6">
                <select name="unit" type="text" class="validate selek">
                  <option value="" disabled selected>Pilih Unit</option>
                  <?php while($row_unit = mysqli_fetch_assoc($tampilkan_unit)):?>
                  <option value="<?=$row_unit['nama'];?>"><?=$row_unit['nama'];?></option>
                  <?php endwhile; ?>
                </select>
                <label for="supplier">Unit</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="input-field col s6">
                <label for="nama_barang">Nama Barang</label>
                <input name="nama_barang" type="text" class="validate">
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
              <div class="input-field col s6">
                <label for="keterangan">Keterangan</label>
                <input name="keterangan" type="text" class="validate">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <button class="btn waves-effect waves-light" type="submit" name="submit">Pesan
                <i class="material-icons left">send</i>
              </button>
              <a class="btn red waves-effect waves-light" href="home.php">Batal
                <i class="material-icons left">clear</i>
              </a>
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