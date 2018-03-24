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
	<script src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>

<div class="atas biru">
	<div id="tblMenu" aksi="bkMenu"><i class="fa fa-bars"></i></div>
	<div class="judul">Laporan</div>
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
		<h2>
			Performa Bulan :
			<select class="box" id="bln" style="width: 30%;">
				<?php
				for ($i=0; $i < 12; $i++) {
					if($i == $blnSkrg) {
						$selected = "selected";
					}else {
						$selected = "";
					}
					echo "<option ".$selected.">".$bln[$i]."</option>";
				}
				?>
			</select>
		</h2>
		<?php
		for ($i=1; $i <= $tglSkrg; $i++) {
			if($i < 10) {
				$i = "0".$i;
			}
			$tanggal = $tgl."-".$i;
			$total = $report->totalTrans($tanggal);
		}
		?>
		<canvas id="myCanvas" width="10px"></canvas>
	</div>
</div>

<script src="../aset/js/script.dasbor.js"></script>

<input type="hidden" id="datas" value="5,0,0,0,12,14,13,25">

<script>
	var canvas = pilih("#myCanvas");
	var ctx = canvas.getContext('2d');
	var datas = pilih("#datas").value;

	google.charts.load('current', {'packages': ['corechart']});

	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Topping');
		data.addColumn('number', 'Slices');
		data.addRows([
			['Mushrooms', 3],
			['Onions', 1]
		]);

		var options = {
			'title': 'Bumbu-bumbu',
			'width': 400,
			'height': 300
		};

		var chart = new google.visualization.PieChart(pilih("#myCanvas"));
		chart.draw(data, options);
	}
</script>

</body>
</html>