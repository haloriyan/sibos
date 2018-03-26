<?php
include 'aksi/ctrl/admin.php';

$sesi = $conn->cekSesi();

$nama = $admin->info($sesi, "nama");
$roleSaya = $admin->info($sesi, "role");

if($roleSaya != $role) {
	die('error : 403');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1">
	<title>Layanan | SiBOS Laundry</title>
	<link href="../aset/fw/build/fw.css" rel="stylesheet">
	<link href="../aset/fw/build/font-awesome.min.css" rel="stylesheet">
	<link href="../aset/css/style.dasbor.css" rel="stylesheet">
	<script src="http://localhost/vendor/embo.js"></script>
	<script src="http://localhost/vendor/jquery-3.1.1.js"></script>
</head>
<body>

<div class="atas biru">
	<div id="tblMenu" aksi="bkMenu"><i class="fa fa-bars"></i></div>
	<div class="judul">Atur Layanan</div>
	<div id="logout"><i class="fa fa-sign-out"></i></div>
</div>

<div class="menu">
	<div class="wrap">
		<a href="./dasbor"><li>Dashboard</li></a>
		<a href="./laporan"><li>Laporan</li></a>
		<a href="./kasir"><li>Kasir</li></a>
		<a href="./layanan" id="active"><li>Layanan</li></a>
		<a href="./setelan"><li>Setelan</li></a>
	</div>
</div>

<div class="container">
	<div class="wrap">
		<div class="bag bag-5">
			<button id="tambah" class="tbl biru"><i class="fa fa-plus"></i> &nbsp; Layanan</button>
		</div>
		<div class="bag bag-5">
			<input type="text" class="box" id="q" placeholder="Cari layanan..." style="width: 100%;" oninput="cari(this.value);">
		</div>
		<div class="bag bag-10" style="width: 100%;">
			<div id="load"></div>
		</div>
	</div>
</div>

<div class="bg"></div>
<div class="popupWrapper" id="tambahLayanan">
	<div class="popup">
		<div class="wrap">
			<h3>Tambah Layanan</h3>
			<div class="isi">Nama Layanan :</div>
			<input type="text" class="box" id="namaAdd">
			<div class="isi">Harga (Rp) :</div>
			<input type="number" class="box" id="hargaAdd">
			<div class="isi">Satuan :</div>
			<select class="box" id="satuanAdd">
				<option value="kg">Kg</option>
				<option value="bijian">Bijian</option>
			</select>
			<div class="bag-tombol" style="margin-top: 10px;">
				<div class="bag bag-5" style="width: 47%;">
					<button class="merah" id="batal">BATAL</button>
				</div>
				<div class="bag bag-5" style="width: 47%;">
					<button class="hijau" id="tambahkan">Tambah</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="popupWrapper" id="hapusLayanan">
	<div class="popup">
		<div class="wrap">
			<h3>Hapus Layanan</h3>
			<div id="formHapus"></div>
			<div class="bag-tombol" style="margin-top: 18px;">
				<div class="bag bag-5" style="width: 47%;">
					<button class="merah" id="batal">BATAL</button>
				</div>
				<div class="bag bag-5" style="width: 47%;">
					<button class="hijau" id="yaHapus">HAPUS</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="popupWrapper" id="editLayanan">
	<div class="popup">
		<div class="wrap">
			<h3>Ubah Layanan</h3>
			<div id="formEdit"></div>
			<div class="bag-tombol" style="margin-top: 18px;">
				<div class="bag bag-5" style="width: 47%;">
					<button class="merah" id="batal">BATAL</button>
				</div>
				<div class="bag bag-5" style="width: 47%;">
					<button class="hijau" id="yaUbah">UBAH</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="../aset/js/script.dasbor.js"></script>
<script>
	function load(area) {
		ambil("../aksi/load/layanan.php", function(respon) {
			tulis(area, respon);
		});
	}
	load("#load");

	klik("#tambah", function() {
		munculPopup("#tambahLayanan");
	});

	tekan("Escape", function() {
		hilangPopup("#tambahLayanan");
		hilangPopup("#hapusLayanan");
		hilangPopup("#editLayanan");
	});

	klik("#tambahkan", function() {
		var nama = pilih("#namaAdd").value;
		var harga = pilih("#hargaAdd").value;
		var satuan = pilih("#satuanAdd").value;
		var add = "nama="+nama+"&harga="+harga+"&satuan="+satuan;
		if(nama == "" || harga == "") {
			return false;
		}else {
			pos("../aksi/layanan/tambah.php", add, function() {
				pilih("#namaAdd").value = "";
				pilih("#hargaAdd").value = "";
				pilih("#satuanAdd").value = "kg";
				hilangPopup("#tambahLayanan");
				load("#load");
			});
		}
	});

	function hapus(val) {
		var kuki = "namakuki=idlayanan&value="+val+"&durasi=3690";
		pos("../aksi/setCookie.php", kuki, function() {
			munculPopup("#hapusLayanan");
			ambil("../aksi/load/formHapusLayanan.php", function(resp) {
				tulis("#formHapus", resp);
			});
		});
	}

	klik("#yaHapus", function() {
		pos("../aksi/layanan/hapus.php", "idlay=feu", function() {
			hilangPopup("#hapusLayanan");
			load("#load");
		});
	});

	function edit(val) {
		var kuki = "namakuki=idlayanan&value="+val+"&durasi=3690";
		pos("../aksi/setCookie.php", kuki, function() {
			munculPopup("#editLayanan");
			ambil("../aksi/load/formEditLayanan.php", function(resp) {
				tulis("#formEdit", resp);
			});
		});
	}

	klik("#yaUbah", function() {
		var nama = pilih("#namaEdit").value;
		var harga = pilih("#hargaEdit").value;
		var ubah = "nama="+nama+"&harga="+harga;
		if(nama == "" || harga == "") {
			return false;
		}else {
			pos("../aksi/layanan/ubah.php", ubah, function() {
				hilangPopup("#editLayanan");
				load("#load");
			});
		}
	});

	function cari(val) {
		var kuki = "namakuki=qCari&value="+val+"&durasi=4000";
		pos("../aksi/setCookie.php", kuki, function() {
			load("#load");
		});
	}
</script>

</body>
</html>