<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1">
	<title>Pelanggan | SiBOS Laundry</title>
	<link href="../aset/fw/build/fw.css" rel="stylesheet">
	<link href="../aset/fw/build/font-awesome.min.css" rel="stylesheet">
	<link href="../aset/css/style.dasbor.css" rel="stylesheet">
	<script src="http://cdn.riyansatria.tk/embo.js"></script>
</head>
<body>

<div class="atas biru">
	<div id="tblMenu" aksi="bkMenu"><i class="fa fa-bars"></i></div>
	<div class="judul">Pelanggan</div>
</div>

<div class="menu">
	<div class="wrap">
		<a href="#"><li>Dashboard</li></a>
		<a href="#"><li>Transaksi</li></a>
		<a href="#"><li>Laporan</li></a>
		<a href="#" id="active"><li>Pelanggan</li></a>
		<a href="#"><li>Karyawan</li></a>
		<a href="#"><li>Layanan</li></a>
	</div>
</div>

<div class="container">
	<div class="wrap">
		<div class="bag bag-5">
			<button id="tambah" class="tbl biru"><i class="fa fa-plus"></i> Pelanggan</button>
		</div>
		<div class="bag bag-5">
			<input type="text" class="box" id="q" placeholder="Cari pelanggan..." style="width: 100%;" oninput="cari(this.value);">
		</div>
		<div class="bag bag-10" style="width: 100%;">
			<div id="load"></div>
			<!--
			<table>
				<thead>
					<tr>
						<th class="biru" style="width: 10%;">ID</th>
						<th class="biru">Nama</th>
						<th class="biru">No. Telp</th>
						<th class="biru">Alamat</th>
						<th class="biru">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>123</td>
						<td>Riyan Satria</td>
						<td>085321450680</td>
						<td>Di rumah</td>
						<td>
							<button class="hijau" onclick="ubah(this.value);" value=""><i class="fa fa-edit"></i></button>
							<button class="merah" onclick="hapus(this.value);" value=""><i class="fa fa-trash"></i></button>
						</td>
					</tr>
					<tr>
						<td>348</td>
						<td>Mark Zuckerberg</td>
						<td>083854709345</td>
						<td>Pucang Anom</td>
						<td>
							<button class="hijau" onclick="ubah(this.value);" value=""><i class="fa fa-edit"></i></button>
							<button class="merah" onclick="hapus(this.value);" value=""><i class="fa fa-trash"></i></button>
						</td>
					</tr>
					<tr>
						<td>923</td>
						<td>Dominic Toretto</td>
						<td>084382391009</td>
						<td>Klampis Anom</td>
						<td>
							<button class="hijau" onclick="ubah(this.value);" value=""><i class="fa fa-edit"></i></button>
							<button class="merah" onclick="hapus(this.value);" value=""><i class="fa fa-trash"></i></button>
						</td>
					</tr>
				</tbody>
			</table>
			-->
		</div>
	</div>
</div>

<div class="bg"></div>
<div class="popupWrapper" id="tambahPelanggan">
	<div class="popup">
		<div class="wrap">
			<h3>Tambah Pelanggan</h3>
			<div class="isi">Nama :</div>
			<input type="text" class="box" id="namaAdd">
			<div class="isi">No. Telp :</div>
			<input type="text" class="box" id="telpAdd">
			<div class="isi">Alamat</div>
			<textarea class="box" id="alamatAdd"></textarea>
			<div class="bag-tombol">
				<div class="bag bag-5" style="width: 47%;">
					<button class="merah" id="batal">BATALKAN</button>
				</div>
				<div class="bag bag-5" style="width: 47%;">
					<button class="hijau" id="tambahkan">TAMBAHKAN</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="popupWrapper" id="ubahPelanggan">
	<div class="popup">
		<div class="wrap">
			<h3>Ubah Data Pelanggan</h3>
			<div id="form"></div>
			<div class="bag-tombol">
				<div class="bag bag-5" style="width: 47%;">
					<button class="merah" id="batal">BATAL</button>
				</div>
				<div class="bag bag-5" style="width: 47%;">
					<button class="hijau" id="ubahEdit">UBAH</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="popupWrapper" id="hapusPelanggan">
	<div class="popup">
		<div class="wrap">
			<h3>Hapus Data Pelanggan</h3>
			<div id="formHapus"></div>
			<div class="bag-tombol">
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

<script src="../aset/js/script.dasbor.js"></script>
<script>
	klik("#tambah", function() {
		munculPopup("#tambahPelanggan");
	});
	klik(".bg", function() {
		hilangPopup("#tambahPelanggan");
	});
	klik("#batal", function() {
		hilangPopup("#tambahPelanggan");
		hilangPopup("#ubahPelanggan");
		hilangPopup("#hapusPelanggan");
	});
	tekan("Escape", function() {
		hilangPopup("#tambahPelanggan");
		hilangPopup("#ubahPelanggan");
		hilangPopup("#hapusPelanggan");
	});
	ambil("../aksi/load/pelanggan.php", function(respon) {
		tulis("#load", respon);
	});
	function edit(val) {
		munculPopup("#ubahPelanggan");
		var kuki = "namakuki=idpelanggan&value="+val+"&durasi=3600";
		pos("../aksi/setCookie.php", kuki, function() {
			ambil("../aksi/load/formEditPelanggan.php", function(data) {
				tulis("#form", data);
			});
		});
	}
	function cari(val) {
		var kuki = "namakuki=qCari&value="+val+"&durasi=3600";
		pos("../aksi/setCookie.php", kuki, function() {
			ambil("../aksi/load/pelanggan.php", function(respon) {
				tulis("#load", respon);
			});	
		});
	}
	function hapus(val) {
		munculPopup("#hapusPelanggan");
		var kuki = "namakuki=idpelanggan&value="+val+"&durasi=3650";
		pos("../aksi/setCookie.php", kuki, function() {
			ambil("../aksi/load/formHapusPelanggan.php", function(data) {
				tulis("#formHapus", data);
			});
		});
	}

	klik("#ubahEdit", function() {
		var nama = pilih("#namaEdit").value;
		var notelp = pilih("#telpEdit").value;
		var alamat = pilih("#alamatEdit").value;
		var edit = "nama="+nama+"&notelp="+notelp+"&alamat="+alamat;
		pos("../aksi/ubahPelanggan.php", edit, function() {
			hilangPopup("#ubahPelanggan");
			ambil("../aksi/load/pelanggan.php", function(respon) {
				tulis("#load", respon);
			});	
		});
	});

	klik("#tambahkan", function() {
		var nama = pilih("#namaAdd").value;
		var notelp = pilih("#telpAdd").value;
		var alamat = pilih("#alamatAdd").value;
		var add = "nama="+nama+"&notelp="+notelp+"&alamat="+alamat;
		pos("../aksi/tambahPelanggan.php", add, function() {
			hilangPopup("#tambahPelanggan");
			pilih("#namaAdd").value = "";
			pilih("#telpAdd").value = "";
			pilih("#alamatAdd").value = "";
			ambil("../aksi/load/pelanggan.php", function(respon) {
				tulis("#load", respon);
			});	
		});
	});

	klik("#yaHapus", function() {
		pos("../aksi/hapusPelanggan.php", "idpel=ias", function() {
			hilangPopup("#hapusPelanggan");
			ambil("../aksi/load/pelanggan.php", function(respon) {
				tulis("#load", respon);
			});	
		});
	});
</script>

</body>
</html>