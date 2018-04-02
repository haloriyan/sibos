<?php
include '../ctrl/layanan.php';

$id = $_COOKIE['idlayanan'];

$nama = $layanan->info($id, "nama");
?>
Yakin ingin menghapus layanan <b><?php echo $nama; ?></b> ?