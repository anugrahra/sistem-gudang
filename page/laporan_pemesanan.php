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
      $pemesanan = tampilkan_pemesanan();
      $nourut = 1;
      ?>

      <main>

        <div class="row">
          <div class="col s12">
            <h4><div class="center"><b>LAPORAN PEMESANAN</b></div></h4>
          </div>
        </div>

        <div id="cetakLaporan">
          
          <div class="row">
            <div class="col s12">
              <table class="highlight responsive-table centered opname">
                <thead>
                  <tr>
                      <th>No</th>
                      <th>No. Order</th>
                      <th>Nama Pemesan</th>
                      <th>Unit</th>
                      <th>Nama Barang</th>
                      <th>Jumlah</th>
                      <th>Keterangan</th>
                  </tr>
                </thead>

                <tbody>
                  <?php while($row = mysqli_fetch_assoc($pemesanan)):?>
                  <tr>
                    <td><?=$nourut++;?></td>
                    <td><?=$row['no_order'];?></a></td>
                    <td><?=$row['nama_pemesan'];?></td>
                    <td><?=$row['unit'];?></td>
                    <td><?=$row['nama_barang'];?></td>
                    <td><?=$row['jumlah'];?></td>
                    <td><?=$row['keterangan'];?></td>
                  </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
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