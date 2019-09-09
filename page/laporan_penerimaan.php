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
      $barangnya = tampilkan_barang();
      $penerimaan = tampilkan_penerimaan();
      $nourut = 1;

      if(isset($_GET['kode_barang'])){
        $kode = $_GET['kode_barang'];
        $penerimaan = tampilkan_penerimaan_by_kode($kode);
      }
      ?>

      <main>

        <div class="row">
          <div class="col s12">
            <h4><div class="center"><b>LAPORAN PENERIMAAN</b></div></h4>
          </div>
        </div>

        <form action="" method="get" class="">
          <div class="row">
            <div class="col s12">
              <div class="input-field col s4">
                <select name="kode_barang" type="text" class="validate selek">
                  <option value="" disabled selected>Pilih Barang</option>
                  <?php while($row_barang = mysqli_fetch_assoc($barangnya)):?>
                  <option value="<?=$row_barang['kode'];?>"><?=$row_barang['kode'];?> | <?=$row_barang['nama'];?></option>
                  <?php endwhile; ?>
                </select>
              </div>
              <br>
              <div class="col s6">
                <button class="btn waves-effect waves-light" type="submit">Lihat
                  <i class="material-icons left">content_copy</i>
                </button>
              </div>
            </div>
          </div>
        </form>

        <div id="cetakLaporan">
          
          <div class="row">
            <div class="col s12">
              <table class="highlight responsive-table centered opname">
                <thead>
                  <tr>
                      <th>No</th>
                      <th>No Surat Jalan</th>
                      <th>Ket. Penerimaan</th>
                      <th>Tanggal</th>
                      <th>Supplier</th>
                      <th>Penerima</th>
                  </tr>
                </thead>

                <tbody>
                  <?php while($row = mysqli_fetch_assoc($penerimaan)):?>
                  <tr>
                    <td><?=$nourut++;?></td>
                    <td><a href="laporan_penerimaan_surat_jalan.php?suratjalan=<?=$row['no_surat_jalan'];?>"><?=$row['no_surat_jalan'];?></a></td>
                    <td><?=$row['keterangan'];?></td>
                    <td><?= date('d-m-Y', strtotime($row['tanggal']));?></td>
                    <td><?=$row['supplier'];?></td>
                    <td><?=$row['user'];?></td>
                  </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
            </div>
          </div>

          <div class="row">
            <div class="col s12">
              <br>
              Dibuat tanggal <?=date('j F Y');?>, oleh <b><?=$_SESSION['username'];?></b>
            </div>
          </div>

        </div>

        <div class="row">
          <div class="center">
            <div class="col s12">
              <button class="btn waves-effect waves-light" onclick="printContent('cetakLaporan')">Print PDF
                <i class="material-icons left">picture_as_pdf</i>
              </button>
            </div>
          </div>
        </div>

      </main>

      <?php
      require_once "../aset/view/footer.php";
      require_once "../aset/view/footcontent.php";
      ?>
    </body>
  </html>