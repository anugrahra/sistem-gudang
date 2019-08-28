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
      $stock_opname = tampilkan_stock_opname();
      $nourut = 1;

      if(isset($_POST['submit'])){
        $barang = $_GET['nama_barang'];
        $penerimaan = tampilkan_penerimaan_by_barang($barang);
      }
      ?>

      <main>

        <div class="row">
          <div class="col s12">
            <h4><div class="center"><b>STOCK OPNAME</b></div></h4>
          </div>
        </div>

        <div class="row">
          <div class="col s2">
            <select type="text" class="validate selek">
              <option value="" disabled selected>Pilih Bulan</option>
              <option value="01">Januari</option>
              <option value="02">Februari</option>
              <option value="03">Maret</option>
              <option value="04">April</option>
              <option value="05">Mei</option>
              <option value="06">Juni</option>
              <option value="07">Juli</option>
              <option value="08">Agustus</option>
              <option value="09">September</option>
              <option value="10">Oktober</option>
              <option value="11">November</option>
              <option value="12">Desember</option>
            </select>
          </div>
        </div>

        <div id="cetakLaporan">
          
          <div class="row">
            <div class="col s12">
              <table class="highlight responsive-table centered opname">
                <thead>
                  <tr>
                    <th rowspan="2" class="center">No</th>
                    <th rowspan="2" class="center">Nama Barang</th>
                    <th rowspan="2" class="center">Satuan</th>
                    <th colspan="4" class="center">Volume</th>
                    <th rowspan="2" class="center">Keterangan</th>
                  </tr>
                  <tr>
                    <th class="center">Saldo Awal</th>
                    <th class="center">Masuk</th>
                    <th class="center">Keluar</th>
                    <th class="center">Saldo Akhir</th>
                  </tr>
                </thead>

                <tbody>
                  <?php while($row = mysqli_fetch_assoc($stock_opname)): ?>
                  <tr>
                    <td><?=$nourut++;?></td>
                    <td><?=$row['nama_barang'];?></td>
                    <td><?=$row['satuan'];?></td>
                    <td><?=$row['saldo_awal'];?></td>
                    <td><?=$row['masuk'];?></td>
                    <td><?=$row['keluar'];?></td>
                    <td><?=$row['saldo_akhir'];?></td>
                    <td><?=$row['keterangan'];?></td>
                  </tr>
                  <?php endwhile;?>
                </tbody>
              </table>
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