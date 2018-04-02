<?php
include '../ctrl/layanan.php';

$id = $_COOKIE['idlayanan'];
$nama = $layanan->info($id, "nama");
$harga = $layanan->info($id, "harga");
?>
<div class="isi">Nama Layanan :</div>
<input type="text" class="box" id="namaEdit" value="<?php echo $nama; ?>">
<div class="isi">Harga :</div>
<input type="number" class="box" id="hargaEdit" value="<?php echo $harga; ?>">