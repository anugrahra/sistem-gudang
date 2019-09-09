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
      $pengeluaran = tampilkan_pengeluaran();
      $nourut = 1;

      if(isset($_GET['kode_barang'])){
        $kode = $_GET['kode_barang'];
        $pengeluaran = tampilkan_pengeluaran_by_kode($kode);
      }

      ?>

      <main>

        <div class="row">
          <div class="col s12">
            <h4><div class="center"><b>LAPORAN PENGELUARAN</b></div></h4>
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
                      <th>Barang</th>
                      <th>No Surat Pengambilan</th>
                      <th>Ket. Pengeluaran</th>
                      <th>Tanggal</th>
                      <th>Pengguna</th>
                      <th>Kode Barang</th>
                      <th>Jumlah</th>
                      <th>Petugas</th>
                  </tr>
                </thead>

                <tbody>
                  <?php while($row = mysqli_fetch_assoc($pengeluaran)):?>
                  <tr>
                    <td><?=$nourut++;?></td>
                    <td><a href="kartu_stock.php?kode=<?=$row['kode_barang'];?>"><?=$row['barang'];?></td>
                    <td><?=$row['no_surat_pengambilan'];?></td>
                    <td><?=$row['keterangan'];?></td>
                    <td><?= date('d-m-Y', strtotime($row['tanggal']));?></td>
                    <td><?=$row['unit'];?></td>
                    <td><?=$row['kode_barang'];?></td>
                    <td><?=$row['jumlah'];?></td>
                    <td><?=$row['petugas'];?></td>
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