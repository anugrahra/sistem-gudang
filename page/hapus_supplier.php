<?php
require_once "../fungsi/db.php";
require_once "../fungsi/fungsi.php";

if(isset($_GET['id'])){
	if(hapus_supplier($_GET['id'])){
		header('location:list_supplier.php');
	}else{
		echo 'gagal menghapus data';
	}
}
?>