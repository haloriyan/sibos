<?php
include '../ctrl/admin.php';

$id = $_COOKIE['idadmin'];
$nama = $admin->info($id, "nama");
$telepon = $admin->info($id, "telepon");
$alamat = $admin->info($id, "alamat");
$role = $admin->info($id, "role");

if($role == "admin") {
	$isiRole =  '<option value="admin" selected>Admin</option>'.
				'<option value="kasir">Kasir</option>';
}else {
	$isiRole =  '<option value="kasir" selected>Kasir</option>'.
				'<option value="admin">Admin</option>';
}
?>
<div class="isi">Nama :</div>
<input type="text" class="box" id="namaEdit" value="<?php echo $nama; ?>">
<div class="isi">Telepon :</div>
<input type="number" class="box" id="telpEdit" value="<?php echo $telepon; ?>">
<div class="isi">Alamat :</div>
<textarea class="box" id="alamatEdit"><?php echo $alamat; ?></textarea>
<div class="isi">Role :</div>
<select class="box" id="roleEdit">
	<?php echo $isiRole; ?>
</select>