<?php
include '../ctrl/pelanggan.php';

$id = "USR".rand(1,9999);
$nama = $_POST['nama'];
$notelp = $_POST['notelp'];
$alamat = $_POST['alamat'];
$added = time();

$pelanggan->tambah($id, $nama, $notelp, $alamat, $added);