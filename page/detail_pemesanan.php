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
        $surat = $_GET['surat'];

        if(isset($_GET['surat'])){
            $detaiw = tampilkan_pemesanan_by_surat($surat);
            $detail = tampilkan_pemesanan_by_surat($surat);
            while ($row = mysqli_fetch_assoc($detail)){
                $no = 1;
                $tanggal = $row['tanggal'];
                $pemesan = $row['nama_pemesan'];
                $noorder = $row['no_order'];
                $bagian = $row['unit'];
                $namabarang = $row['nama_barang'];
                $jumlah = $row['jumlah'];
                $satuan = $row['satuan'];
                $keterangan = $row['keterangan'];
            }
        }
        ?>

        <main>    

        <div class="row center">
            <div class="col s12">
                <h4><b>DETAIL PEMESANAN</b></h4>
            </div>
        </div>

        <div id="cetakLaporan">
        
            <div class="row">
                <div class="col s3">
                    <table class="tablestokbarang">
                        <tr>
                            <th>Tanggal</th>
                            <td><?=date('d-m-Y', strtotime($tanggal));?></td>
                        </tr>
                        <tr>
                            <th>Pemesan</th>
                            <td><?=$pemesan;?></td>
                        </tr>
                        <tr>
                            <th>Bagian</th>
                            <td><?=$bagian;?></td>
                        </tr>
                    </table>
                </div>
                <div class="col s5"></div>
                <div class="col s4">
                    <table class="tablestokbarang">
                        <tr>
                            <th>No. Order</th>
                            <td><?=$noorder;?></td>
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
                <?php while($riw = mysqli_fetch_assoc($detaiw)):?>
                    <tr>
                        <td><?=$no++;?></td>
                        <td><?=$riw['nama_barang'];?></td>
                        <td><?=$riw['jumlah'];?></td>
                        <td><?=$riw['satuan'];?></td>
                        <td><?=$riw['keterangan'];?></td>
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