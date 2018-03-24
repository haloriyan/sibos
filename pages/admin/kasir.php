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
	<title>Kasir | SiBOS Laundry</title>
	<link href="../aset/fw/build/fw.css" rel="stylesheet">
	<link href="../aset/fw/build/font-awesome.min.css" rel="stylesheet">
	<link href="../aset/css/style.dasbor.css" rel="stylesheet">
	<script src="../aset/js/embo.js"></script>
</head>
<body>

<div class="atas biru">
	<div id="tblMenu" aksi="bkMenu"><i class="fa fa-bars"></i></div>
	<div class="judul">Kasir</div>
	<div id="logout"><i class="fa fa-sign-out"></i></div>
</div>

<div class="menu">
	<div class="wrap">
		<a href="./dasbor"><li>Dashboard</li></a>
		<a href="./laporan"><li>Laporan</li></a>
		<a href="./kasir" id="active"><li>Kasir</li></a>
		<a href="./layanan"><li>Layanan</li></a>
		<a href="./setelan"><li>Setelan</li></a>
	</div>
</div>

<div class="container">
	<div class="wrap">
		<div class="bag bag-5">
			<button id="tambah" class="tbl biru"><i class="fa fa-plus"></i> &nbsp; Kasir</button>
		</div>
		<div class="bag bag-5">
			<div class="bag bag-3 rata-tengah" style="padding-top: 17px;font-size: 22px;">Role :</div>
			<div class="bag bag-7" style="width: 68%;">
				<select class="box" onchange="tipe(this.value);">
					<option>Pilih...</option>
					<option>Kasir</option>
					<option>Admin</option>
					<option value="">Semua</option>
				</select>
			</div>
		</div>
		<div class="bag bag-10" style="width: 100%;">
			<div id="load"></div>
		</div>
	</div>
</div>

<div class="bg"></div>
<div class="popupWrapper" id="tambahKasir">
	<div class="popup">
		<div class="wrap">
			<h3>Tambah Kasir</h3>
			<div class="isi">Nama :</div>
			<input type="text" class="box" id="namaAdd">
			<div class="isi">Telepon :</div>
			<input type="number" class="box" id="telpAdd">
			<div class="isi">Alamat :</div>
			<textarea class="box" id="alamatAdd"></textarea>
			<div class="isi">Username :</div>
			<input type="text" class="box" id="unameAdd">
			<div class="isi">Password :</div>
			<input type="password" class="box" id="pwdAdd">
			<div class="isi">Role :</div>
			<select class="box" id="roleAdd">
				<option>Kasir</option>
				<option>Admin</option>
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

<div class="popupWrapper" id="ubahKasir">
	<div class="popup">
		<div class="wrap">
			<h3>Ubah Data Kasir</h3>
			<div id="formUbah"></div>
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

<div class="popupWrapper" id="hapusKasir">
	<div class="popup">
		<div class="wrap">
			<h3>Hapus Kasir</h3>
			<div id="formHapus"></div>
			<div class="bag-tombol" style="margin-top: 18px;">
				<div class="bag bag-5" style="width: 47%;">
					<button id="batal">BATAL</button>
				</div>
				<div class="bag bag-5" style="width: 47%;">
					<button class="merah" id="yaHapus">HAPUS</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="../aset/js/script.dasbor.js"></script>
<script>
	function load(area) {
		ambil("../aksi/load/kasir.php", function(respon) {
			tulis(area, respon);
		});
	}
	load("#load");

	klik(".bg", function() {
		hilangPopup("#tambahKasir");
		hilangPopup("#ubahKasir");
	});
	klik("#batal", function() {
		hilangPopup("#tambahKasir");
		hilangPopup("#ubahKasir");
	});
	tekan("Escape", function() {
		hilangPopup("#tambahKasir");
		hilangPopup("#ubahKasir");
	})

	klik("#tambah", function() {
		munculPopup("#tambahKasir");
	});

	klik("#tambahkan", function() {
		var nama = pilih("#namaAdd").value;
		var telepon = pilih("#telpAdd").value;
		var alamat = pilih("#alamatAdd").value;
		var uname = pilih("#unameAdd").value;
		var pwd = pilih("#pwdAdd").value;
		var role = pilih("#roleAdd").value;
		var add = "nama="+nama+"&telepon="+telepon+"&alamat="+alamat+"&uname="+uname+"&pwd="+pwd+"&role="+role;
		if(nama == "" || telepon == "" || alamat == "" || uname == "" || pwd == "") {
			return false;
		}else {
			pos("../aksi/admin/tambah.php", add, function() {
				hilangPopup("#tambahKasir");
				load("#load");
			});
		}
	});

	function edit(val) {
		var kuki = "namakuki=idadmin&value="+val+"&durasi=3760";
		pos("../aksi/setCookie.php", kuki, function() {
			ambil("../aksi/load/formEditAdmin.php", function(respon) {
				munculPopup("#ubahKasir");
				tulis("#formUbah", respon);
			});
		});
	}

	klik("#yaUbah", function() {
		var nama = pilih("#namaEdit").value;
		var telepon = pilih("#telpEdit").value;
		var alamat = pilih("#alamatEdit").value;
		var role = pilih("#roleEdit").value;
		var ubah = "nama="+nama+"&telepon="+telepon+"&alamat="+alamat+"&role="+role;
		if(nama == "" || telepon == "" || alamat == "") {
			return false;
		}else {
			pos("../aksi/admin/ubah.php", ubah, function() {
				hilangPopup("#ubahKasir");
				load("#load");
			});
		}
	});

	function tipe(val) {
		var kuki = "namakuki=roleAdmin&value="+val+"&durasi=3650";
		pos("../aksi/setCookie.php", kuki, function() {
			load("#load");
		});
	}

	function hapus(val) {
		var kuki = "namakuki=idadmin&value="+val+"&durasi=3655";
		pos("../aksi/setCookie.php", kuki, function() {
			ambil("../aksi/load/formHapusAdmin.php", function(resp) {
				munculPopup("#hapusKasir");
				tulis("#formHapus", resp);
			});
		});
	}

	klik("#yaHapus", function() {
		pos("../aksi/admin/hapus.php", "ya=ef", function() {
			hilangPopup("#hapusKasir");
			load("#load");
		});
	});
</script>

</body>
</html>