<?php
include '../ctrl/layanan.php';

$id = rand(1,100);
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$satuan = $_POST['satuan'];

$layanan->tambah($id, $nama, $harga, $satuan);