<?php
include '../ctrl/transaksi.php';

$id = $_COOKIE['idtransaksi'];

$nama = $trans->info($id, "nama");
$telepon = $trans->info($id, "telepon");
$alamat = $trans->info($id, "alamat");
$status = $trans->info($id, "status");
$bayar = $trans->info($id, "bayar");
$note = $trans->info($id, "catatan");

$s = explode(" ", $status);
if($s[0] == "Belum") {
	$optStatus = '<option>Belum diambil</option><option>Sudah diambil</option>';
}else {
	$optStatus = '<option>Sudah diambil</option><option>Belum diambil</option>';
}
?>
<div class="isi">Nama Pelanggan :</div>
<input type="text" class="box" id="namaEdit" value="<?php echo $nama; ?>">
<div class="isi">No. Telepon :</div>
<input type="number" class="box" id="telpEdit" value="<?php echo $telepon; ?>">
<div class="isi">Alamat :</div>
<textarea class="box" id="alamatEdit"><?php echo $alamat; ?></textarea>
<div class="isi">Bayar :</div>
<input type="number" class="box" id="bayarEdit" value="<?php echo $bayar; ?>">
<div class="isi">Catatan :</div>
<textarea class="box" id="noteEdit"><?php echo $note; ?></textarea>
<div class="isi">Sudah diambil?</div>
<select class="box" id="statusEdit">
	<?php echo $optStatus; ?>
</select>