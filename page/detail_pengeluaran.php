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
                <h4><b>DETAIL PENGELUARAN</b></h4>
            </div>
        </div>

        <div id="cetakLaporan">
        
            <div class="row">
                <div class="col s3">
                    <table class="tablestokbarang">
                        <tr>
                            <th>Tanggal</th>
                            <td>tanggal</td>
                        </tr>
                        <tr>
                            <th>Pengambil</th>
                            <td>pengambil</td>
                        </tr>
                        <tr>
                            <th>Bagian</th>
                            <td>bagian</td>
                        </tr>
                    </table>
                </div>
                <div class="col s5"></div>
                <div class="col s4">
                    <table class="tablestokbarang">
                        <tr>
                            <th>No. Pengambilan Barang</th>
                            <td>no pengambilan barang</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row">
            <div class="col s12">
                <table class="highlight responsive-table centered opname">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Keteragan</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
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