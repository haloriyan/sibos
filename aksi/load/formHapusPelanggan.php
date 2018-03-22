<?php
include '../ctrl/pelanggan.php';

$id = $_COOKIE['idpelanggan'];
$nama = $pelanggan->info($id, "nama");
?>
Yakin ingin menghapus <b><?php echo $nama; ?></b>?
<br /><br />