<?php
include '../ctrl/pelanggan.php';

$id = $_COOKIE['idpelanggan'];
$nama = $pelanggan->info($id, "nama");
$notelp = $pelanggan->info($id, "telepon");
$alamat = $pelanggan->info($id, "alamat");
?>
<div class="isi">Nama :</div>
<input type="text" class="box" id="namaEdit" value="<?php echo $nama; ?>">
<div class="isi">No. Telepon :</div>
<input type="text" class="box" id="telpEdit" value="<?php echo $notelp; ?>">
<div class="isi">Alamat :</div>
<textarea class="box" id="alamatEdit"><?php echo $alamat; ?></textarea>