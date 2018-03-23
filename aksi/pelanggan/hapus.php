<?php
include '../ctrl/pelanggan.php';

$id = $_COOKIE['idpelanggan'];

$pelanggan->hapus($id);