<?php
include '../aksi/ctrl/admin.php';

$sesi = $admin->cekSesi();

$role = $admin->info($sesi, "role");
?>
Tunggu sebentar...
<input type="hidden" id="role" value="<?php echo $role; ?>">
<script>
	var role = document.getElementById('role').value;
	setTimeout(function() {
		document.location = "../"+role+"/dasbor";
	}, 2000);
</script>