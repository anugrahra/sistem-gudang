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

function tampilkan_pemesanan(){
	global $link;

	$query = "SELECT * FROM pemesanan ORDER BY id";
	$result = mysqli_query($link, $query) or die ('gagal menampilkan list pemesanan');

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

	$query = "SELECT * FROM penerimaan ORDER BY id DESC";
	$result = mysqli_query($link, $query) or die ('gagal menampilkan data transaksi penerimaan');

	return $result;
}

function tampilkan_pengeluaran(){
	global $link;

	$query = "SELECT * FROM pengeluaran ORDER BY id DESC";
	$result = mysqli_query($link, $query) or die ('gagal menampilkan data transaksi pengeluaran');

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

function tampilkan_stock_opname(){
	global $link;

	$query = "SELECT * FROM stok_opname";
	$result = mysqli_query($link, $query) or die ('gagal menampilkan data stock opname');

	return $result;
}

//FUNGSI TAMBAH
function tambah_barang($nama, $qty, $jenis, $num_kode, $kode){
	$nama  = escape($nama);
	$qty   = escape($qty);

	$query = "INSERT INTO barang (nama, stok, jenis, num_kode, kode) VALUES ('$nama', '$qty', '$jenis', '$num_kode', '$kode')";

	return run($query);
}

function tambah_stok_opname($nama_barang, $satuan, $saldo_awal, $masuk, $keluar, $saldo_akhir, $keterangan, $tanggal){
	$query = "INSERT INTO stok_opname (nama_barang, satuan, saldo_awal, masuk, keluar, saldo_akhir, keterangan, bulan) VALUES ('$nama_barang', '$satuan', '$saldo_awal', '$masuk', '$keluar', '$saldo_akhir', '$keterangan', '$tanggal')";

	return run($query);
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
function transaksi_barang_masuk($keterangan_penerimaan, $tanggal, $supplier, $kode_barang, $nama_barang, $jumlah, $user, $no_surat_jalan){
	$keterangan_penerimaan = escape($keterangan_penerimaan);

	$query = "INSERT INTO penerimaan (keterangan, tanggal, supplier, kode_barang, barang, jumlah, user, no_surat_jalan) VALUES ('$keterangan_penerimaan', '$tanggal', '$supplier', '$kode_barang', '$nama_barang', '$jumlah', '$user', '$no_surat_jalan')";

	return run($query);
}

function transaksi_pemesanan($no_order, $nama_pemesan, $unit, $nama_barang, $jumlah, $keterangan){
	$query = "INSERT INTO pemesanan(no_order, nama_pemesan, unit, nama_barang, jumlah, keterangan) VALUES ('$no_order', '$nama_pemesan', '$unit', '$nama_barang', '$jumlah', '$keterangan')";

	return run($query);
}

function transaksi_barang_keluar($no_transaksi, $keterangan_pengeluaran, $tanggal, $unit, $kode_barang, $nama_barang, $jumlah, $no_surat_pengambilan, $user){
	$no_transaksi 		    = escape($no_transaksi);
	$keterangan_pengeluaran = escape($keterangan_pengeluaran);

	$query = "INSERT INTO pengeluaran (no_transaksi, keterangan, tanggal, unit, kode_barang, barang, jumlah, no_surat_pengambilan, petugas) VALUES ('$no_transaksi', '$keterangan_pengeluaran', '$tanggal', '$unit', '$kode_barang', '$nama_barang', '$jumlah', '$no_surat_pengambilan', '$user')";

	return run($query);
}

function transaksi_barang_hilang($tanggal, $kode_barang, $nama_barang, $jumlah, $keterangan, $user){
	$keterangan = escape($keterangan);

	$query = "INSERT INTO kehilangan (tanggal, kode_barang, barang, jumlah, keterangan, pelapor) VALUES ('$tanggal', '$kode_barang', '$nama_barang', '$jumlah', '$keterangan', '$user')";

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

function opname_per_bulan($bulan){
	global $link;

	$query = "SELECT * FROM stok_opname WHERE MONTH(bulan)=$bulan";
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

	$query = "SELECT * FROM penerimaan WHERE kode = '$kode' ORDER BY id DESC";
	$result = mysqli_query($link, $query);

	return $result;	
}

function tampilkan_kartu_stock_by_kode($kode_barang){
	global $link;

	$query = "SELECT * FROM kartu_stock WHERE kode_barang = '$kode_barang'";
	$result = mysqli_query($link, $query);

	return $result;
}

function tampilkan_pengeluaran_by_barang($barang){
	global $link;

	$query = "SELECT * FROM pengeluaran WHERE barang = '$barang' ORDER BY id DESC";
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