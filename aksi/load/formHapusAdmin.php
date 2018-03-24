<?php
include '../ctrl/admin.php';

$id = $_COOKIE['idadmin'];
$nama = $admin->info($id, "nama");
?>
Yakin ingin menghapus <b><?php echo $nama; ?></b> ?