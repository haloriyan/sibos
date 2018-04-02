<?php
include 'aksi/ctrl/transaksi.php';

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
	<title>Transaksi | SiBOS Laundry</title>
	<link href="../aset/fw/build/fw.css" rel="stylesheet">
	<link href="../aset/fw/build/font-awesome.min.css" rel="stylesheet">
	<link href="../aset/css/style.dasbor.css" rel="stylesheet">
	<script src="../aset/js/embo.js"></script>
</head>
<body>

<div class="atas biru">
	<div id="tblMenu" aksi="bkMenu"><i class="fa fa-bars"></i></div>
	<div class="judul">Transaksi</div>
	<div id="logout"><i class="fa fa-sign-out"></i></div>
</div>

<div class="menu">
	<div class="wrap">
		<a href="./dasbor" id="active"><li>Dashboard</li></a>
		<a href="./transaksi"><li>Transaksi</li></a>
	</div>
</div>

<div class="container">
	<div class="wrap">
		<div class="bag bag-5">
			<button id="tambah" class="tbl biru"><i class="fa fa-plus"></i> &nbsp; Transaksi Baru</button>
		</div>
		<div class="bag bag-5">
			<input type="text" class="box" id="q" placeholder="Cari transaksi..." style="width: 100%;" oninput="cari(this.value);">
		</div>
		<div class="bag bag-10" style="width: 100%;">
			<div id="load"></div>
		</div>
	</div>
</div>

<div class="bg"></div>
<div class="popupWrapper" id="tambahTrans">
	<div class="popup">
		<div class="wrap">
			<h3>Tambah Transaksi</h3>
			<div class="isi">Nama Pelanggan :</div>
			<input type="text" class="box" id="namaAdd">
			<div class="isi">No. Telepon :</div>
			<input type="number" class="box" id="telpAdd">
			<div class="isi">Alamat :</div>
			<textarea class="box" id="alamatAdd"></textarea>
			<div class="bag bag-5">
				<div class="isi">Kuantitas :</div>
				<input type="number" class="box" id="qtyAdd" style="width: 80%;">
			</div>
			<div class="bag bag-5">
			<div class="isi">Layanan :</div>
				<select class="box" id="layananAdd">
					<?php
					foreach ($trans->layanan() as $row) {
						echo "<option value='".$row['idlayanan']."'>".$row['nama']." ( Rp ".$row['harga']." / ".$row['satuan']." )</option>";
					}
					?>
				</select>
			</div>
			<div class="isi">Bayar (Rp):</div>
			<input type="number" class="box" id="bayarAdd">
			<div class="isi">Catatan :</div>
			<textarea class="box" id="noteAdd"></textarea>
			<div class="bag-tombol">
				<div class="bag bag-5">
					<button class="merah" id="batal">BATAL</button>
				</div>
				<div class="bag bag-5">
					<button class="hijau" id="tambahkan">TAMBAHKAN</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="popupWrapper" id="ubahTransaksi">
	<div class="popup">
		<div class="wrap">
			<h3>Ubah Transaksi</h3>
			<div id="formEdit"></div>
			<div class="bag-tombol">
				<div class="bag bag-5">
					<button class="merah" id="batal">BATAL</button>
				</div>
				<div class="bag bag-5">
					<button class="hijau" id="yaUbah">UBAH</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="popupWrapper" id="lihatTransaksi">
	<div class="popup">
		<div class="wrap">
			<h3>Lihat Transaksi</h3>
			<div id="formLihat"></div>
			<div class="bag-tombol">
				<button class="hijau" class="batal">TUTUP</button>
			</div>
		</div>
	</div>
</div>

<script src="../aset/js/script.dasbor.js"></script>
<script>
	function load(area) {
		ambil("../aksi/load/transaksi2.php", function(respon) {
			tulis(area, respon);
		});
	}

	load("#load");

	klik("#tambah", function() {
		munculPopup("#tambahTrans");
	});

	klik(".bg", function() {
		hilangPopup("#tambahTrans");
		hilangPopup("#ubahTransaksi");
		hilangPopup("#lihatTransaksi");
	});
	tekan("Escape", function() {
		hilangPopup("#tambahTrans");
		hilangPopup("#ubahTransaksi");
		hilangPopup("#lihatTransaksi");
	});
	klik("#batal", function() {
		hilangPopup("#tambahTrans");
		hilangPopup("#ubahTransaksi");
		hilangPopup("#lihatTransaksi");
	});

	klik("#tambahkan", function() {
		var nama = pilih("#namaAdd").value;
		var telepon = pilih("#telpAdd").value;
		var alamat = pilih("#alamatAdd").value;
		var qty = pilih("#qtyAdd").value;
		var layanan = pilih("#layananAdd").value;
		var bayar = pilih("#bayarAdd").value;
		var note = pilih("#noteAdd").value;
		var add = "nama="+nama+"&telepon="+telepon+"&alamat="+alamat+"&qty="+qty+"&layanan="+layanan+"&bayar="+bayar+"&note="+note;
		if(nama == "" || telepon == "" || alamat == "" || qty == "") {
			return false;
		}else {
			pos("../aksi/transaksi/tambah.php", add, function() {
				hilangPopup("#tambahTrans");
				load("#load");
			});
		}
	});

	function edit(val) {
		var kuki = "namakuki=idtransaksi&value="+val+"&durasi=3650";
		pos("../aksi/setCookie.php", kuki, function() {
			munculPopup("#ubahTransaksi");
			ambil("../aksi/load/formEditTransaksi.php", function(resp) {
				tulis("#formEdit", resp);
			});
		});
	}

	klik("#yaUbah", function() {
		var nama = pilih("#namaEdit").value;
		var telepon = pilih("#telpEdit").value;
		var alamat = pilih("#alamatEdit").value;
		var bayar = pilih("#bayarEdit").value;
		var note = pilih("#noteEdit").value;
		var status = pilih("#statusEdit").value;
		var ubah = "nama="+nama+"&telepon="+telepon+"&alamat="+alamat+"&bayar="+bayar+"&note="+note+"&status="+status;
		if(nama == "" || telepon == "" || alamat == "") {
			return false;
		}else {
			pos("../aksi/transaksi/ubah.php", ubah, function() {
				hilangPopup("#ubahTransaksi");
				load("#load");
			});
		}
	});

	function lihat(val) {
		var kuki = "namakuki=idtransaksi&value="+val+"&durasi=4010";
		pos("../aksi/setCookie.php", kuki, function() {
			munculPopup("#lihatTransaksi");
			ambil("../aksi/load/formLihatTransaksi.php", function(resp) {
				tulis("#formLihat", resp);
			});
		});
	}
</script>

</body>
</html>