<?php
include '../ctrl/layanan.php';

$id = $_COOKIE['idlayanan'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];

$diubah = "nama,harga";
$value = $nama.",".$harga;

$s = explode(",", $diubah);
$v = explode(",", $value);

for ($i=0; $i < count($v); $i++) { 
	$layanan->ubah($id, $s[$i], $v[$i]);
}