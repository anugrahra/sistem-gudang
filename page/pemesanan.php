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
        $tanggal      = $_POST['tanggal'];
        $nama_pemesan = $_POST['nama_pemesan'];
        $unit         = $_POST['unit'];
        $nama_barang  = $_POST['nama_barang'];
        $jumlah       = $_POST['jumlah'];
        $satuan       = $_POST['satuan'];
        $keterangan   = $_POST['keterangan'];

        if(!empty($no_order) && !empty($tanggal) && !empty($nama_pemesan) && !empty($unit)  && !empty($nama_barang) && !empty($jumlah) && !empty($satuan)){
          
          if(transaksi_pemesanan($no_order, $tanggal, $nama_pemesan, $unit, $nama_barang, $jumlah, $satuan, $keterangan)){
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
            $mail->addAddress('hendriannnn@gmail.com');
            $mail->addCC('dialog.anugrah@gmail.com');
            $mail->addReplyTo('elang.uptdam@gmail.com', 'Elang');

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Pemesanan Barang';
            $mail->Body    = '<div style="background-color:#2196F3; color: white;"><h1><center>Pemesanan Barang</center></h1></div>
            <b>No Order:</b> ' . $no_order . '<br>
            <b>Tanggal:</b> ' . $tanggal . '<br>
            <b>Pemesan:</b> ' . $nama_pemesan . '<br>
            <b>Unit:</b> ' . $unit . '<br>
            <b>Pesanan:</b> ' . $nama_barang . '<br>
            <b>Jumlah:</b> ' . $jumlah . ' ' . $satuan . '<br>
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

        <div class="row center">
          <div class="col s12">
            <h4><b>PEMESANAN BARANG</b></h4>
          </div>
        </div>

        <div class="row">
        <form action="" method="post" class="col s12 z-depth-5">
            
              <div class="input-field col s6">
                <label for="no_order">No Order</label>
                <input name="no_order" type="text" class="validate">
              </div>
          
              <div class="input-field col s6">
                <label for="tanggal">Tanggal</label>
                <input name="tanggal" type="date" class="validate" id="tglSekarang">
              </div>

              <div class="input-field col s6">
                <label for="nama_pemesan">Pemesan</label>
                <input name="nama_pemesan" type="text" class="validate">
              </div>
          
              <div class="input-field col s6">
                <select name="unit" type="text" class="validate selek">
                  <option value="" disabled selected>Pilih Bagian</option>
                  <?php while($row_unit = mysqli_fetch_assoc($tampilkan_unit)):?>
                  <option value="<?=$row_unit['nama'];?>"><?=$row_unit['nama'];?></option>
                  <?php endwhile; ?>
                </select>
                <label for="supplier">Bagian</label>
              </div>
          
              <div class="input-field col s6">
                <label for="nama_barang">Nama Barang</label>
                <input name="nama_barang" type="text" class="validate">
              </div>
          
              <div class="input-field col s6">
                <label for="jumlah">Jumlah</label>
                <input name="jumlah" type="number" class="validate">
              </div>
          
              <div class="input-field col s6">
                <label for="satuan">Satuan</label>
                <input name="satuan" type="text" class="validate">
              </div>
          
              <div class="input-field col s6">
                <label for="keterangan">Keterangan</label>
                <input name="keterangan" type="text" class="validate">
              </div>

            <div class="col s12 center" style="margin-bottom: 10px;">
              <button class="btn waves-effect waves-light" type="submit" name="submit">Pesan
                <i class="material-icons left">send</i>
              </button>
              <a class="btn red waves-effect waves-light" href="home.php">Batal
                <i class="material-icons left">clear</i>
              </a>
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