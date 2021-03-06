<?php

function run($query){
	global $link;

	if(mysqli_query($link, $query)) return true;
	else return false;
}

function escape($data){
	global $link;
	return mysqli_real_escape_string($link, $data);
}

function sistem_login($username, $password){
	$username = escape($username);
	$password = escape($password);

	$query = "SELECT * FROM akun WHERE username = '$username' AND password = '$password'";
	global $link;

	if($result = mysqli_query($link, $query)){
		if(mysqli_num_rows($result) > 0 ){
			$row_akun = mysqli_fetch_array($result);
			$_SESSION['id']       = $row_akun['id'];
			$_SESSION['username'] = $row_akun['username'];
			$_SESSION['level']    = $row_akun['level'];
			header('location: page/home.php');
		}else{
			echo "<script>alert('Username / Password yang anda masukan salah');</script>";
		}
	}

	return true;
}


//FUNGSI TAMPILKAN
function tampilkan_barang(){
	global $link;

	$query = "SELECT * FROM barang ORDER BY kode";
	$result = mysqli_query($link, $query) or die ('gagal menampilkan list barang');

	return $result;
}

function tampilkan_barang_perhalaman(){
	global $link, $awal, $per_page;

	$query = "SELECT * FROM barang ORDER BY kode LIMIT $awal, $per_page";
	$result = mysqli_query($link, $query) or die ('gagal menampilkan list barang');

	return $result;
}

function tampilkan_jenis_barang(){
	global $link;

	$query = "SELECT * FROM jenis_barang";
	$result = mysqli_query($link, $query) or die ('gagal menampilkan jenis barang');

	return $result;
}

function tampilkan_supplier(){
	global $link;

	$query = "SELECT * FROM supplier";
	$result = mysqli_query($link, $query) or die ('gagal menampilkan data supplier');

	return $result;
}

function tampilkan_penerimaan(){
	global $link;

	$query = "SELECT * FROM penerimaan GROUP BY no_surat_jalan ORDER BY tanggal DESC";
	$result = mysqli_query($link, $query) or die ('gagal menampilkan data transaksi penerimaan');

	return $result;
}

function tampilkan_pengeluaran(){
	global $link;

	$query = "SELECT * FROM pengeluaran GROUP BY no_surat_pengambilan ORDER BY id DESC";
	$result = mysqli_query($link, $query) or die ('gagal menampilkan data transaksi pengeluaran');

	return $result;
}

function tampilkan_pemesanan(){
	global $link;

	$query = "SELECT * FROM pemesanan GROUP BY no_order ORDER BY id";
	$result = mysqli_query($link, $query) or die ('gagal menampilkan list pemesanan');

	return $result;
}

function penerimaan_per_bulan($bulan){
	global $link;

	$query = "SELECT * FROM penerimaan WHERE MONTH(tanggal)=$bulan GROUP BY no_surat_jalan ORDER BY id DESC";
	$result = mysqli_query($link, $query);

	return $result;
}

function pengeluaran_per_bulan($bulan){
	global $link;

	$query = "SELECT * FROM pengeluaran WHERE MONTH(tanggal)=$bulan GROUP BY no_surat_pengambilan ORDER BY id DESC";
	$result = mysqli_query($link, $query);

	return $result;
}

function pemesanan_per_bulan($bulan){
	global $link;

	$query = "SELECT * FROM pemesanan WHERE MONTH(tanggal)=$bulan GROUP BY no_order ORDER BY id DESC";
	$result = mysqli_query($link, $query);

	return $result;
}

function tampilkan_unit(){
	global $link;

	$query = "SELECT * FROM unit ORDER BY nama";
	$result = mysqli_query($link, $query) or die ('gagal menampilkan data unit');

	return $result;
}

function tampilkan_user(){
	global $link;

	$query = "SELECT * FROM akun ORDER BY level";
	$result = mysqli_query($link, $query) or die ('gagal menampilkan data user');

	return $result;
}

function tampilkan_kehilangan(){
	global $link;

	$query = "SELECT * FROM kehilangan ORDER BY id DESC";
	$result = mysqli_query($link, $query) or die ('gagal menampilkan data barang hilang');

	return $result;
}

//TAMPILKAN BY SURAT
function tampilkan_penerimaan_by_surat($surat){
	global $link;

	$query = "SELECT * FROM penerimaan WHERE no_surat_jalan = '$surat' ORDER BY id DESC";
	$result = mysqli_query($link, $query);

	return $result;	
}

function tampilkan_pengeluaran_by_surat($surat){
	global $link;

	$query = "SELECT * FROM pengeluaran WHERE no_surat_pengambilan = '$surat' ORDER BY id DESC";
	$result = mysqli_query($link, $query);

	return $result;	
}

function tampilkan_pemesanan_by_surat($surat){
	global $link;

	$query = "SELECT * FROM pemesanan WHERE no_order = '$surat' ORDER BY id DESC";
	$result = mysqli_query($link, $query);

	return $result;	
}

//OPNAME
function tampilkan_stock_opname(){
	global $link;

	$query = "SELECT * FROM stok_opname ORDER BY bulan DESC";
	$result = mysqli_query($link, $query) or die ('gagal menampilkan data stock opname');

	return $result;
}

function opname_per_bulan($bulan){
	global $link;

	$query = "SELECT * FROM stok_opname WHERE MONTH(bulan)=$bulan";
	$result = mysqli_query($link, $query);

	return $result;
}

function cek_barang_opname($kode_barang, $tanggal){
	global $link;

	$bulan = date("m",strtotime($tanggal));
	$query = "SELECT * FROM stok_opname WHERE kode_barang = '$kode_barang' AND MONTH(bulan) = '$bulan'";
	$result = mysqli_query($link, $query) or die ('gagal ngecek barang opname');

	return $result;
}

function tambah_stok_opname($nama_barang, $kode_barang, $satuan, $masuk, $keluar, $saldo_akhir, $tanggal){
	$query = "INSERT INTO stok_opname (nama_barang, kode_barang, satuan, masuk, keluar, saldo_akhir, bulan) VALUES ('$nama_barang', '$kode_barang', '$satuan', '$masuk', '$keluar', '$saldo_akhir', '$tanggal')";

	return run($query);
}

function update_stok_opname_terima($masuk, $saldo_akhir, $kode_barang, $tanggal){
	$bulan = date("m", strtotime($tanggal));

	$query = "UPDATE stok_opname SET masuk= masuk + '$masuk', saldo_akhir='$saldo_akhir' WHERE kode_barang = '$kode_barang' AND MONTH(bulan) = '$bulan'";

	return run($query);
}

function update_stok_opname_keluar($keluar, $saldo_akhir, $kode_barang, $tanggal){
	$bulan = date("m", strtotime($tanggal));

	$query = "UPDATE stok_opname SET keluar = keluar + '$keluar', saldo_akhir='$saldo_akhir' WHERE kode_barang = '$kode_barang' AND MONTH(bulan) = '$bulan'";

	return run($query);
}

function opname_per_id($id){
	global $link;

	$query = "SELECT * FROM stok_opname WHERE id=$id";
	$result = mysqli_query($link, $query);

	return $result;
}

function update_saldo_awal_opname($id, $saldo_awal){
	$query = "UPDATE stok_opname SET saldo_awal = '$saldo_awal' WHERE id = $id";

	return run($query);
}

function update_keterangan_opname($id, $keterangan){
	$query = "UPDATE stok_opname SET keterangan = '$keterangan' WHERE id = $id";

	return run($query);
}

//FUNGSI TAMBAH
function tambah_barang($nama, $qty, $jenis, $num_kode, $kode, $satuan){
	$nama  = escape($nama);
	$qty   = escape($qty);

	$query = "INSERT INTO barang (nama, stok, jenis, num_kode, kode, satuan) VALUES ('$nama', '$qty', '$jenis', '$num_kode', '$kode', '$satuan')";

	return run($query);
}

function cek_surat_jalan($no_surat_jalan, $tabelnya){
	global $link;

	$query = "SELECT * FROM $tabelnya WHERE no_surat_jalan = '$no_surat_jalan'";
	$result = mysqli_query($link, $query) or die ('gagal ngecek surat jalan');

	return $result;
}

function tambah_kartu_stock($nama_barang, $tanggal, $kode_barang, $keterangan, $masuk, $keluar, $sisa, $pengguna){
	$query = "INSERT INTO kartu_stock (nama_barang, tanggal, kode_barang, keterangan, masuk, keluar, sisa, pengguna) VALUES ('$nama_barang', '$tanggal', '$kode_barang', '$keterangan', '$masuk', '$keluar', '$sisa', '$pengguna')";

	return run($query);
}

function tambah_supplier($kode, $nama, $alamat, $no_kontak, $email, $num_kode){
	$nama      = escape($nama);
	$alamat    = escape($alamat);
	$no_kontak = escape($no_kontak);

	$query = "INSERT INTO supplier (kode, nama, alamat, no_kontak, email, num_kode) VALUES ('$kode', '$nama', '$alamat', '$no_kontak', '$email', '$num_kode')";

	return run($query);
}

function tambah_unit($nama){
	$nama = escape($nama);

	$query = "INSERT INTO unit (nama) VALUES ('$nama')";

	return run($query);
}

function tambah_user($username, $password, $level){
	$username = escape($username);
	$password = md5(escape($password));
	$level    = escape($level);

	$query = "INSERT INTO akun (username, password, level) VALUES ('$username', '$password', '$level')";

	return run($query);
}

function tambah_jenis_barang($jenis, $alpha_kode){
	$jenis      = escape($jenis);
	$alpha_kode = escape($alpha_kode);

	$query = "INSERT INTO jenis_barang (jenis, alpha_kode) VALUES ('$jenis', '$alpha_kode')";

	return run($query);
}

//FUNGSI TRANSAKSI
function transaksi_barang_masuk($keterangan_penerimaan, $tanggal, $supplier, $kode_barang, $nama_barang, $jumlah, $user, $no_surat_jalan, $satuan){
	$keterangan_penerimaan = escape($keterangan_penerimaan);

	$query = "INSERT INTO penerimaan (keterangan, tanggal, supplier, kode_barang, barang, jumlah, user, no_surat_jalan, satuan) VALUES ('$keterangan_penerimaan', '$tanggal', '$supplier', '$kode_barang', '$nama_barang', '$jumlah', '$user', '$no_surat_jalan', '$satuan')";

	return run($query);
}

function transaksi_pemesanan($no_order, $tanggal, $nama_pemesan, $unit, $nama_barang, $jumlah, $satuan, $keterangan){
	$query = "INSERT INTO pemesanan(no_order, tanggal, nama_pemesan, unit, nama_barang, jumlah, satuan, keterangan) VALUES ('$no_order', '$tanggal', '$nama_pemesan', '$unit', '$nama_barang', '$jumlah', '$satuan',  '$keterangan')";

	return run($query);
}

function transaksi_barang_keluar($keterangan, $tanggal, $unit, $penerima, $kode_barang, $barang, $jumlah, $no_surat_pengambilan, $satuan){

	$query = "INSERT INTO pengeluaran (keterangan, tanggal, unit, penerima, kode_barang, barang, jumlah, no_surat_pengambilan, satuan) VALUES ('$keterangan', '$tanggal', '$unit', '$penerima', '$kode_barang', '$barang', '$jumlah', '$no_surat_pengambilan', '$satuan')";

	return run($query);
}

function stok_awal($nama_barang){
	global $link;

	$query = "SELECT stok FROM barang WHERE nama='$nama_barang'";
	$result = mysqli_query($link, $query) or die ('gagal menampilkan stok awal');

	return $result;
}

function tambah_stok_barang($stok_aktual, $kode_barang){
	$query = "UPDATE barang SET stok='$stok_aktual' WHERE kode='$kode_barang'";

	return run($query);
}

function show_last_num_kode(){
	global $link;

	$query = "SELECT num_kode FROM barang ORDER BY id DESC LIMIT 1";
	$result = mysqli_query($link, $query) or die ('gagal menampilkan nomor kode barang terakhir');

	return $result;
}

function show_last_num_kode_supplier(){
	global $link;

	$query = "SELECT num_kode FROM supplier ORDER BY id DESC LIMIT 1";
	$result = mysqli_query($link, $query) or die ('gagal menampilkan nomor kode supplier terakhir');

	return $result;
}


//CARI
function hasil_cari_barang($cari_barang){
	global $link;

	$query = "SELECT * FROM barang WHERE kode LIKE '%$cari_barang%' OR nama LIKE '%$cari_barang%' OR jenis LIKE '%$cari_barang%' OR kode LIKE '%$cari_barang%' OR stok LIKE '%$cari_barang%'";

	$result = mysqli_query($link, $query) or die ('gagal menampilkan hasil cari barang');
	
	return $result;
}

function hasil_cari_supplier($cari_supplier){
	global $link;

	$query = "SELECT * FROM supplier WHERE kode LIKE '%$cari_supplier%' OR nama LIKE '%$cari_supplier%' OR alamat LIKE '%$cari_supplier%' OR no_kontak LIKE '%$cari_supplier%' OR email LIKE '%$cari_supplier%'";

	$result = mysqli_query($link, $query) or die ('gagal menampilkan hasil cari supplier');
	
	return $result;
}

function hasil_cari_barang_hilang($cari_barang_hilang){
	global $link;

	$query = "SELECT * FROM hilang WHERE nama LIKE '%$cari_barang_hilang%' OR jumlah LIKE '%$cari_barang_hilang%' OR tanggal LIKE '%$cari_barang_hilang%'";

	$result = mysqli_query($link, $query) or die ('gagal menampilkan hasil cari barang hilang');
	
	return $result;
}

//TAMPILKAN PER KODE
function barang_per_kode($kode){
	global $link;

	$query = "SELECT * FROM barang WHERE kode='$kode'";
	$result = mysqli_query($link, $query);

	return $result;
}


//TAMPILKAN PER ID
function barang_per_id($id){
	global $link;

	$query = "SELECT * FROM barang WHERE id=$id";
	$result = mysqli_query($link, $query);

	return $result;
}

function jenis_barang_per_id($id){
	global $link;

	$query = "SELECT * FROM jenis_barang WHERE id=$id";
	$result = mysqli_query($link, $query);

	return $result;
}

function akun_per_id($id){
	global $link;

	$query = "SELECT * FROM akun WHERE id=$id";
	$result = mysqli_query($link, $query);

	return $result;
}

function unit_per_id($id){
	global $link;

	$query = "SELECT * FROM unit WHERE id=$id";
	$result = mysqli_query($link, $query);

	return $result;
}

function supplier_per_id($id){
	global $link;

	$query = "SELECT * FROM supplier WHERE id=$id";
	$result = mysqli_query($link, $query);

	return $result;
}

//EDIT DATA
function edit_data_barang($kode, $nama, $stok, $satuan, $jenis, $num_kode, $id){
	$query = "UPDATE barang SET kode='$kode', nama='$nama', stok='$stok', satuan='$satuan', num_kode='$num_kode' WHERE id=$id";
	
	return run($query);
}

function edit_data_supplier($kode, $nama, $alamat, $no_kontak, $email, $num_kode, $id){
	$query = "UPDATE supplier SET kode='$kode', nama='$nama', alamat='$alamat', no_kontak='$no_kontak', email='$email', num_kode='$num_kode' WHERE id=$id";
	
	return run($query);
}

function edit_data_unit($nama, $id){
	$nama = escape($nama);

	$query = "UPDATE unit SET nama='$nama' WHERE id=$id";
	
	return run($query);
}

function edit_data_user($username, $password, $id){
	$username = escape($username);
	$password = md5(escape($password));

	$query = "UPDATE akun SET username='$username', password='$password' WHERE id=$id";
	
	return run($query);
}

function edit_data_jenis_barang($jenis, $alpha_kode, $id){
	$jenis      = escape($jenis);
	$alpha_kode = escape($alpha_kode);

	$query = "UPDATE jenis_barang SET jenis='$jenis', alpha_kode='$alpha_kode' WHERE id=$id";
	
	return run($query);
}

//HAPUS DATA
function hapus_barang($id){
	$query = "DELETE FROM barang WHERE id=$id";

	return run($query);
}

function hapus_jenis_barang($id){
	$query = "DELETE FROM jenis_barang WHERE id=$id";

	return run($query);
}

function hapus_supplier($id){
	$query = "DELETE FROM supplier WHERE id=$id";

	return run($query);
}

function hapus_unit($id){
	$query = "DELETE FROM unit WHERE id=$id";

	return run($query);
}

function hapus_user($id){
	$query = "DELETE FROM akun WHERE id=$id";

	return run($query);
}

//UNTUK CETAK LAPORAN
function tampilkan_penerimaan_by_kode($kode){
	global $link;

	$query = "SELECT * FROM penerimaan WHERE kode_barang = '$kode' ORDER BY id DESC";
	$result = mysqli_query($link, $query);

	return $result;	
}

function tampilkan_laporan_penerimaan(){
	global $link;

	$query = "SELECT MIN(id), * from penerimaan GROUP BY no_surat_jalan ORDER BY tanggal DESC";
	$result = mysqli_query($link, $query);

	return $result;
}

function tampilkan_kartu_stock_by_kode($kode_barang){
	global $link;

	$query = "SELECT * FROM kartu_stock WHERE kode_barang = '$kode_barang' ORDER BY tanggal DESC";
	$result = mysqli_query($link, $query);

	return $result;
}

function tampilkan_pengeluaran_by_barang($barang){
	global $link;

	$query = "SELECT * FROM pengeluaran WHERE barang = '$barang' ORDER BY id DESC";
	$result = mysqli_query($link, $query);

	return $result;	
}

function tampilkan_pengeluaran_by_kode($kode){
	global $link;

	$query = "SELECT * FROM pengeluaran WHERE kode_barang = '$kode' ORDER BY id DESC";
	$result = mysqli_query($link, $query);

	return $result;	
}

function tampilkan_stok_by_barang($barang){
	global $link;

	$query = "SELECT * FROM barang WHERE nama = '$barang' ORDER BY id DESC";
	$result = mysqli_query($link, $query);

	return $result;	
}

?>