<?php
session_start();
require_once '../../config/db.php';

if (!isset($_SESSION['user'])) {
	header('Location: ../../index.php');
}

$nama 		= $_POST['nama'];
$password 	= md5($_POST['password']);
$jabatan 	= $_POST['jabatan'];

if (!isset($nama, $password, $jabatan)) {
	header('Location: ../petugas-kasir.php?h=tambah');
}

$sql = "INSERT INTO `tb_users`(`id`, `nama`, `password`, `jabatan`) VALUES ('', '".$nama."', '".$password."', '".$jabatan."')";
$query = $conn->query($sql);

if ($query) {
	header('Location: ../petugas-kasir.php');
} else {
	header('Location: ../petugas-kasir.php?h=tambah');
}