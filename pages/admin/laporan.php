<?php
include 'aksi/ctrl/laporan.php';

$sesi = $conn->cekSesi();

$nama = $admin->info($sesi, "nama");
$roleSaya = $admin->info($sesi, "role");

if($roleSaya != $role) {
	die('error : 403');
}
$tgl = date('Y-m');

$trans 		= $report->totalTrans($tgl);
$barang 	= $report->totBelumAmbil();
$nunggak 	= $report->totNunggak();

$blnSkrg = date('m') - 1;
$tglSkrg = date('d');
$thnSkrg = date('Y');
$bulan = "Januari,Februari,Maret,April,Mei,Juni,Juli,Agustus,September,Oktober,November,Desember";
$bln = explode(",", $bulan);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1">
	<title>Laporan | SiBOS Laundry</title>
	<link href="../aset/fw/build/fw.css" rel="stylesheet">
	<link href="../aset/fw/build/font-awesome.min.css" rel="stylesheet">
	<link href="../aset/css/style.dasbor.css" rel="stylesheet">
	<script src="../aset/js/chart.js"></script>
	<script src="../aset/js/embo.js"></script>
	<script src="../aset/js/jquery-3.1.1.js"></script>
	<style>
		.kiri {
			position: fixed;
			top: 225px;left: 5%;
			width: 45%;
		}
		.kanan {
			position: absolute;
			top: 0px;right: 5%;
			width: 45%;
		}
		#bln { width: 20%; }
		#thn { width: 10%; }
		@media (max-width: 720px) {
			.kiri {
				top: 150px;
				width: 90%;
				position: absolute;
			}
			.kanan {
				width: 90%;
				top: 365px;
			}
			#bln,#thn {
				width: 49%;
			}
		}
	</style>
</head>
<body>

<div class="atas biru">
	<div id="tblMenu" aksi="bkMenu"><i class="fa fa-bars"></i></div>
	<div class="judul">Laporan</div>
	<div id="logout"><i class="fa fa-sign-out"></i></div>
</div>

<div class="menu">
	<div class="wrap">
		<a href="./dasbor"><li>Dashboard</li></a>
		<a href="./laporan" id="active"><li>Laporan</li></a>
		<a href="./kasir"><li>Kasir</li></a>
		<a href="./layanan"><li>Layanan</li></a>
		<a href="./setelan"><li>Setelan</li></a>
	</div>
</div>

<div class="container">
	<div class="wrap">
		<h2>
			Performa Bulan :
		</h2>
		<select class="box" id="bln" onchange="ubahBln(this.value);">
			<?php
			for ($i=0; $i < 12; $i++) {
				if($i == $blnSkrg) {
					$selected = "selected";
				}else {
					$selected = "";
				}
				$val = $i+1;
				if($val < 10) {
					$val = "0".$val;
				}
				echo "<option value='".$val."' ".$selected.">".$bln[$i]."</option>";
			}
			?>
		</select>
		<select class="box" id="thn" onchange="ubahThn(this.value);">
			<?php
			for ($t=2010; $t <= $thnSkrg; $t++) {
				if($t == $thnSkrg) {
					$selected = "selected";
				}else {
					$selected = "";
				}
				echo "<option ".$selected.">".$t."</option>";
			}
			?>
		</select>
		<div id="load"></div>
	</div>
</div>

<script src="../aset/js/script.dasbor.js"></script>

<input type="hidden" id="datas" value="20, 23, 40">

<script>
	klik("#tblMenu", function() {
		var aksi = pilih("#tblMenu").getAttribute("aksi");
		if(aksi == "xMenu") {
			pengaya(".kiri", "left:30%;width:30%;");
		}else {
			pengaya(".kiri", "left:5%");
		}
	});
	function load(area) {
		/*
		ambil("../aksi/load/laporan.php", function(resp) {
			tulis(area, resp);
		});
		*/
		$(function() {
			$.get("../aksi/load/laporan.php", function(resp) {
				$(area).html(resp);
			});
		})
	}

	load("#load");

	var bln = pilih("#bln").value;
	var setBln = "namakuki=bln&value="+bln+"&durasi=3650";
	pos("../aksi/setCookie.php", setBln, function() {
		load("#load");
	});

	var thn = pilih("#thn").value;
	var setThn = "namakuki=thn&value="+thn+"&durasi=3650";
	pos("../aksi/setCookie.php", setThn, function() {
		load("#load");
	});

	function ubahBln(val) {
		var setBln = "namakuki=bln&value="+val+"&durasi=3650";
		pos("../aksi/setCookie.php", setBln, function() {
			load("#load");
		});
	}

	function ubahThn(val) {
		var setThn = "namakuki=thn&value="+val+"&durasi=3650";
		pos("../aksi/setCookie.php", setThn, function() {
			load("#load");
		});
	}
	/*
	var canvas = pilih("#myCanvas");
	var ctx = canvas.getContext('2d');
	var labelnya = pilih("#labelnya").value;
	alert(labelnya);

	function bikinChart() {
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: [labelnya],
				datasets: [{
					label: "Performa Transaksi",
					data: [datanya],
					backgroundColor: 'rgba(52, 152, 219, 0.61)',
					borderColor: "#3498db",
					borderWidth: "1px"
				}]
			}
		});
	}
	*/

	klik("#logout", function() {
		mengarahkan("./logout");
	});
</script>

</body>
</html>