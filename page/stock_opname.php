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
      $namabulan = 'Tahun ' . date('Y');
      $bulan = '00';

      if(isset($_GET['bulan'])){
        $bulan = $_GET['bulan'];
        $stock_opname = opname_per_bulan($_GET['bulan']);

        if($bulan === '01'){
          $namabulan = 'Bulan Januari';
        }elseif($bulan === '02'){
          $namabulan = 'Bulan Februari';
        }elseif($bulan === '03'){
          $namabulan = 'Bulan Maret';
        }elseif($bulan === '04'){
          $namabulan = 'Bulan April';
        }elseif($bulan === '05'){
          $namabulan = 'Bulan Mei';
        }elseif($bulan === '06'){
          $namabulan = 'Bulan Juni';
        }elseif($bulan === '07'){
          $namabulan = 'Bulan Juli';
        }elseif($bulan === '08'){
          $namabulan = 'Bulan Agustus';
        }elseif($bulan === '09'){
          $namabulan = 'Bulan September';
        }elseif($bulan === '10'){
          $namabulan = 'Bulan Oktober';
        }elseif($bulan === '11'){
          $namabulan = 'Bulan November';
        }elseif($bulan === '12'){
          $namabulan = 'Bulan Desember';
        }else{
          $namabulan = 'Tahun ' . date('Y');
        }
      } else {
        $stock_opname = tampilkan_stock_opname();
      }
      ?>

      <main>

        <div class="row">
          <div class="col s12">
            <h4><div class="center"><b>STOCK OPNAME</b></div></h4>
          </div>
        </div>

        <form action="" method="get">
          <div class="row">
            <div class="col s2">
              <select type="text" class="validate selek" name="bulan">
                <option value="" disabled selected>Pilih Bulan</option>
                <!-- <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option> -->
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>
            </div>
            <div>
              <button class="btn waves-effect waves-light" type="submit" name="submit">Lihat
                <i class="material-icons left">remove_red_eye</i>
              </button>
            </div>
          </div>
        </form>

        <div id="cetakLaporan">
          <div class="row">
            <div class="col s12 center">
              <?='<b>' . $namabulan . '</b><br><br>';?>
              <table class="highlight responsive-table centered opname">
                <thead>
                <?php
                  $dispelayiw = '';
                  if ( $_SESSION['username'] !== 'Administrator') {
                    $dispelayiw = 'none';
                  }
                ?>
                  <tr>
                    <th rowspan="2" class="center">No</th>
                    <th rowspan="2" class="center">Nama Barang</th>
                    <th rowspan="2" class="center">Satuan</th>
                    <th colspan="4" class="center">Volume</th>
                    <th rowspan="2" class="center">Keterangan</th>
                    <th rowspan="2" colspan="3" style="display:<?=$dispelayiw;?>;">Admin</th>
                  </tr>
                  <tr>
                    <th class="center">Saldo Awal</th>
                    <th class="center">Masuk</th>
                    <th class="center">Keluar</th>
                    <th class="center">Saldo Akhir</th>
                  </tr>
                </thead>

                <tbody>
                  <?php while($row = mysqli_fetch_assoc($stock_opname)):
                  $dispelay = '';
                  if ( $_SESSION['username'] !== 'Administrator') {
                    $dispelay = 'none';
                  }
                  
                  $syaldo_awal = $row['saldo_awal']; 

                  if ($syaldo_awal == 0) {
                    $syaldo_awal = '';
                  }
                  ?>
                  <tr>
                    <td><?=$nourut++;?></td>
                    <td><a href="kartu_stock.php?kode=<?=$row['kode_barang'];?>"><?=$row['nama_barang'];?></a></td>
                    <td><?=$row['satuan'];?></td>
                    <td><?=$syaldo_awal;?></td>
                    <td><?=$row['masuk'];?></td>
                    <td><?=$row['keluar'];?></td>
                    <td><?=$row['saldo_akhir'];?></td>
                    <td><?=$row['keterangan'];?></td>
                    <td style="display:<?=$dispelayiw;?>;"><?= date('M', strtotime($row['bulan']));?></td>
                    <td style="display:<?=$dispelayiw;?>;"><a href="opname_saldo_awal.php?id=<?=$row['id'];?>" style="display:<?=$dispelay;?>;">input saldo awal</a></td>
                    <td style="display:<?=$dispelayiw;?>;"><a href="opname_keterangan.php?id=<?=$row['id'];?>" style="display:<?=$dispelay;?>;">input keterangan</a></td>
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
              <a class="btn lighten-1 waves-effect waves-light" href="opname_input_saldo_awal_keterangan.php">Admin
                <i class="material-icons left">clear</i>
              </a>
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