<?php
include 'aksi/ctrl/setelan.php';

$sesi = $conn->cekSesi();

$nama = $admin->info($sesi, "nama");
$roleSaya = $admin->info($sesi, "role");

if($roleSaya != $role) {
	die('error : 403');
}

$note = $setelan->catatan();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1">
	<title>Setelan | SiBOS Laundry</title>
	<link href="../aset/fw/build/fw.css" rel="stylesheet">
	<link href="../aset/fw/build/font-awesome.min.css" rel="stylesheet">
	<link href="../aset/css/style.dasbor.css" rel="stylesheet">
	<script src="../aset/js/embo.js"></script>
	<style>
		.bagSetelan {
			box-shadow: 1px 1px 4px #ccc;
			padding: 1px;
			width: 60%;
		}
	</style>
</head>
<body>

<div class="atas biru">
	<div id="tblMenu" aksi="bkMenu"><i class="fa fa-bars"></i></div>
	<div class="judul">Setelan</div>
	<div id="logout"><i class="fa fa-sign-out"></i></div>
</div>

<div class="menu">
	<div class="wrap">
		<a href="./dasbor"><li>Dashboard</li></a>
		<a href="./laporan"><li>Laporan</li></a>
		<a href="./kasir"><li>Kasir</li></a>
		<a href="./layanan"><li>Layanan</li></a>
		<a href="./setelan" id="active"><li>Setelan</li></a>
	</div>
</div>

<div class="container">
	<div class="wrap">
		<div class="bagSetelan">
			<div class="wrap">
				<h3>Catatan di Nota :</h3>
				<textarea class="box" id="note"><?php echo $note; ?></textarea><br />
				<div class="rata-kanan">
					<button class="tbl biru" id="saveNote">SIMPAN</button>
				</div>
				&nbsp; <br /> &nbsp;
			</div>
		</div>
	</div>
</div>

<script src="../aset/js/script.dasbor.js"></script>
<script>
	klik("#saveNote", function() {
		var note = pilih("#note").value;
		var set = "note="+note;
		pos("../aksi/setelan/ubah.php", set, function() {
			alert("Setelan disimpan!");
		});
	});
</script>

</body>
</html>