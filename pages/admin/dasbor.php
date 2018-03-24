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
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1">
	<title>Dashboard | SiBOS Laundry</title>
	<link href="../aset/fw/build/fw.css" rel="stylesheet">
	<link href="../aset/fw/build/font-awesome.min.css" rel="stylesheet">
	<link href="../aset/css/style.dasbor.css" rel="stylesheet">
	<script src="../aset/js/embo.js"></script>
</head>
<body>

<div class="atas biru">
	<div id="tblMenu" aksi="bkMenu"><i class="fa fa-bars"></i></div>
	<div class="judul">Dashboard</div>
	<div id="logout"><i class="fa fa-sign-out"></i></div>
</div>

<div class="menu">
	<div class="wrap">
		<a href="./dasbor" id="active"><li>Dashboard</li></a>
		<a href="./laporan"><li>Laporan</li></a>
		<a href="./kasir"><li>Kasir</li></a>
		<a href="./layanan"><li>Layanan</li></a>
	</div>
</div>

<div class="container">
	<div class="wrap">
		<div class="card biru">
			<div class="wrap">
				<h3><?php echo $trans; ?> Transaksi</h3>
				<p>Hari ini</p>
			</div>
			<div class="more">
				<div class="wrap">
					SELENGKAPNYA <i class="fa fa-angle-double-right"></i>
				</div>
			</div>
		</div>
		<div class="card biru">
			<div class="wrap">
				<h3><?php echo $barang; ?> Barang</h3>
				<p>Belum diambil</p>
			</div>
			<div class="more">
				<div class="wrap">
					SELENGKAPNYA <i class="fa fa-angle-double-right"></i>
				</div>
			</div>
		</div>
		<div class="card biru">
			<div class="wrap">
				<h3><?php echo $nunggak; ?> Orang</h3>
				<p>Masih nunggak</p>
			</div>
			<div class="more">
				<div class="wrap">
					SELENGKAPNYA <i class="fa fa-angle-double-right"></i>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="../aset/js/script.dasbor.js"></script>

</body>
</html>