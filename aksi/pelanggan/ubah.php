<?php
include '../ctrl/pelanggan.php';

$id = $_COOKIE['idpelanggan'];
$nama = $_POST['nama'];
$notelp = $_POST['notelp'];
$alamat = $_POST['alamat'];

$struktur = "nama,telepon,alamat";
$value = $nama.",".$notelp.",".$alamat;

$s = explode(",", $struktur);
$v = explode(",", $value);
for ($i=0; $i < count($s); $i++) { 
	$pelanggan->ubah($id, $s[$i], $v[$i]);
}