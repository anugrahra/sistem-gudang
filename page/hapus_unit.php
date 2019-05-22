<?php
require_once "../fungsi/db.php";
require_once "../fungsi/fungsi.php";

if(isset($_GET['id'])){
	if(hapus_unit($_GET['id'])){
		header('location:list_unit.php');
	}else{
		echo 'gagal menghapus data';
	}
}
?>