<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user'])) {
	header('Location: ../index.php');
}

// Mengelurkan seluruh data barang yang ada di Databae
$sql 			= "SELECT * FROM tb_barang";
$query 			= $conn->query($sql);
$data_barang 	= $query->fetch_all(MYSQLI_ASSOC);

// Nomor untuk increment baris tabel
$no = 1;

require_once 'includes/header.php';
if (!isset($_GET['h'])) {
	require_once 'includes/barang.php';	
} else if ($_GET['h'] == 'tambah') {
	require_once 'includes/'.$_GET['h'].'.php';	
} else if ($_GET['h'] == 'detail') {
	require_once 'includes/'.$_GET['h'].'.php';	
} else if ($_GET['h'] == 'edit-barang') {
	require_once 'includes/'.$_GET['h'].'.php';	
} else if ($_GET['h'] == 'hapus') {
	
	$hapus = $conn->query("DELETE FROM tb_barang WHERE id='".$_GET['id']."'");
	if ($hapus) {
		header('Location: data-barang.php');
	} else {
		header('Location: data-barang.php');
	}

}
require_once 'includes/footer.php';