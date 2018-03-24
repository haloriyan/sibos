<?php
include '../ctrl/laporan.php';
$thn = $_COOKIE['thn'];
$bln = $_COOKIE['bln'];
$tgl = $thn."-".$bln;

$trans 		= $report->totalTrans($tgl);
$barang 	= $report->totBelumAmbil();
$nunggak 	= $report->totNunggak();

$tglSkrg = date('d');

for ($i=1; $i <= $tglSkrg; $i++) {
	if($i < 10) {
		$i = "0".$i;
	}
	$tanggale = $tgl."-".$i;
	$tanggal[] = '"'.$tanggale.'"';
	$total[] = $report->totalTrans($tanggale);
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
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
	$y = '"'.$tanggal[$key].'",';
	$im = implode(",", $tanggal);
}
?>
<input type="hidden" id="labelnya" value='<?php echo $im; ?>'>