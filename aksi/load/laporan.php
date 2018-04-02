<?php
include '../ctrl/laporan.php';
$thn = $_COOKIE['thn'];
$bln = $_COOKIE['bln'];
$tgl = $thn."-".$bln;

$trans 		= $report->totalTrans($tgl);
$barang 	= $report->totBelumAmbil();
$nunggak 	= $report->totNunggak();

$tglSkrg = date('d');
if($bln  == date('m')) {
	$endTgl = $tglSkrg;
}else {
	$endTgl = 31;
}

for ($i=1; $i <= $endTgl; $i++) {
	if($i < 10) {
		$i = "0".$i;
	}
	$tanggale = $tgl."-".$i;
	$tanggal[] = '"'.$tanggale.'"';
	$total[] = '"'.$report->totalTrans($tanggale).'"';
}
?>
<div class="kiri">
	<div>
		<canvas id="myCanvas" width="10px" height="6"></canvas>
	</div>
</div>
<div class="kanan">
	<div class="wrap">
		<table>
			<tbody>
				<tr>
					<td width="50%">Jumlah Transaksi</td>
					<td>
						<?php
						echo $report->jumlahTransaksi($tgl, "")[0];
						?>
						(
						<?php
						echo $report->toIdr($report->jumlahTransaksi($tgl, "nominal")[0]);
						?>
						)
					</td>
				</tr>
				<tr>
					<td>Jumlah Konsumen</td>
					<td><?php echo $report->jumlahKonsumen($tgl); ?> orang</td>
				</tr>
				<tr>
					<td>Uang Cash Diterima</td>
					<td><?php echo $report->toIdr($report->uangDiterima($tgl)[0]); ?></td>
				</tr>
				<tr>
					<td>Uang yang belum Dibayar</td>
					<td><?php echo $report->toIdr($report->uangBlmBayar($tgl)); ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<?php
foreach ($tanggal as $key => $value) {
	$im = implode(",", $tanggal);
}
foreach ($total as $k => $v) {
	$ix = implode(",", $total);
}
?>
<script>
	var canvas = pilih("#myCanvas");
	var ctx = canvas.getContext('2d');

	function bikinChart() {
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: [
					<?php
					echo $im;
					?>
				],
				datasets: [{
					label: "Performa Transaksi",
					data: [
						<?php
						echo $ix;
						?>
					],
					backgroundColor: 'rgba(52, 152, 219, 0.61)',
					borderColor: "#3498db",
					borderWidth: "1px"
				}]
			}
		});
	}

	bikinChart();
</script>