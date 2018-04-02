<?php
include '../ctrl/admin.php';

$id = $_COOKIE['idadmin'];
$nama = $_POST['nama'];
$telepon = $_POST['telepon'];
$alamat = $_POST['alamat'];
$role = strtolower($_POST['role']);

$diubah = "nama,telepon,alamat,role";
$value = $nama.",".$telepon.",".$alamat.",".$role;

$s = explode(",", $diubah);
$v = explode(",", $value);

for ($i=0; $i < count($v); $i++) { 
	$admin->change($id, $s[$i], $v[$i]);
}