<?php
include '../ctrl/transaksi.php';

$id = $_COOKIE['idtransaksi'];
$nama = $_POST['nama'];
$telepon = $_POST['telepon'];
$alamat = $_POST['alamat'];
$bayar = $_POST['bayar'];
$note = $_POST['note'];
$status = $_POST['status'];

$diubah = "nama,telepon,alamat,bayar,note,status";
$value = $nama.",".$telepon.",".$alamat.",".$bayar.",".$note.",".$status;

$s = explode(",", $diubah);
$v = explode(",", $value);

for ($i=0; $i < count($v); $i++) { 
	$trans->ubah($id, $s[$i], $v[$i]);
}