<?php
include '../ctrl/transaksi.php';

$sesi = $conn->cekSesi();

$id = rand(1,99999);
$layanan = $_POST['layanan'];
$idadmin = $admin->info($sesi, "idadmin");
$nama = $_POST['nama'];
$telepon = $_POST['telepon'];
$alamat = $_POST['alamat'];
$tgl = date('Y-m-d');
$qty = $_POST['qty'];
$status = "Belum diambil";
$note = $_POST['note'];

$harga = $trans->getLayanan($layanan, "harga");
$totalHarga = $harga * $qty;

$bayar = $_POST['bayar'];

$trans->tambah($id, $layanan, $idadmin, $nama, $telepon, $alamat, $tgl, $qty, $status, $note, $totalHarga, $bayar);