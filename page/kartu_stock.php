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

    ?>

    <main>

    <div class="row">
        <div class="col s12">
        <h4><div class="center"><b>KARTU STOK</b></div></h4>
        </div>
    </div>

    <div id="cetakLaporan">
        
        <div class="row">
            <div class="col s3">
                <table class="tablestokbarang">
                    <tr>
                        <th>Nama Barang</th>
                        <td>namabarang</td>
                    </tr>
                    <tr>
                        <th>Jenis Barang</th>
                        <td>jenisbarang</td>
                    </tr>
                    <tr>
                        <th>Satuan Barang</th>
                        <td>barang.satuan</td>
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
                <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                    <td>7</td>
                </tr>
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