<?php
require_once "../fungsi/db.php";
require_once "../fungsi/fungsi.php";

if(isset($_GET['id'])){
	if(hapus_jenis_barang($_GET['id'])){
		header('location:list_jenis_barang.php');
	}else{
		echo 'gagal menghapus data';
	}
}
?>