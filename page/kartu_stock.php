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
    $kode_barang = $_GET['kode'];
    if(isset($_GET['kode'])){
        $barang = barang_per_kode($kode_barang);
        while ($row = mysqli_fetch_assoc($barang)){
            $kode   = $row['kode'];
            $nama   = $row['nama'];
            $stok   = $row['stok'];
            $satuan = $row['satuan'];
            $jenis  = $row['jenis'];
        }
    }
    $stock_barang = tampilkan_kartu_stock_by_kode($kode_barang);
    ?>

    <main>

    <div class="row">
        <div class="col s12">
        <h4><div class="center"><b>KARTU STOCK</b></div></h4>
        </div>
    </div>

    <div id="cetakLaporan">
        
        <div class="row">
            <div class="col s3">
                <table class="tablestokbarang">
                    <tr>
                        <th>Nama Barang</th>
                        <td><?=$nama;?></td>
                    </tr>
                    <tr>
                        <th>Jenis Barang</th>
                        <td><?=$jenis;?></td>
                    </tr>
                    <tr>
                        <th>Satuan Barang</th>
                        <td><?=$satuan;?></td>
                    </tr>
                </table>
            </div>
            <div class="col s5"></div>
            <div class="col s4">
                <table class="tablestokbarang">
                    <tr>
                        <th>No. Kode</th>
                        <td style="border: 1px solid black;">nokode</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
        <div class="col s12">
            <table class="highlight responsive-table centered opname">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>No. Bon</th>
                    <th>Keterangan</th>
                    <th>Masuk</th>
                    <th>Keluar</th>
                    <th>Sisa</th>
                    <th>Pengguna</th>
                </tr>
            </thead>

            <tbody>
            <?php while($row = mysqli_fetch_assoc($stock_barang)):?>
                <tr>
                    <td><?=$row['tanggal'];?></td>
                    <td><?=$row['no_bon'];?></td>
                    <td><?=$row['keterangan'];?></td>
                    <td><?=$row['masuk'];?></td>
                    <td><?=$row['keluar'];?></td>
                    <td><?=$row['sisa'];?></td>
                    <td><?=$row['pengguna'];?></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
            </table>
        </div>
        </div>

    </div>

    <div class="row">
        <div class="center">
        <div class="col s12">
            <a href="" class="btn waves-effect waves-light">Stok Opname
                <i class="material-icons left">keyboard_backspace</i>
            </a>
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