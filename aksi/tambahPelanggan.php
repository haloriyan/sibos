<?php
include 'ctrl/pelanggan.php';

$id = rand(1,99999);
$nama = $_POST['nama'];
$notelp = $_POST['notelp'];
$alamat = $_POST['alamat'];
$added = time();

$pelanggan->tambah($id, $nama, $notelp, $alamat, $added);