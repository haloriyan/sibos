<table>
	<thead>
		<tr>
			<th class="biru" style="width: 10%;">ID</th>
			<th class="biru">Nama</th>
			<th class="biru">Harga</th>
			<th class="biru">Satuan</th>
			<th class="biru">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		error_reporting(1);
		include '../ctrl/layanan.php';
		$key = $_COOKIE['qCari'];
		foreach ($layanan->all($key) as $row) {
			$idlayanan = $row['idlayanan'];
			echo "<tr>".
				 	"<td>".$row['idlayanan']."</td>".
				 	"<td>".$row['nama']."</td>".
				 	"<td>".$row['harga']."</td>".
				 	"<td>".$row['satuan']."</td>".
				 	"<td>".
				 		'<button class="hijau" onclick="edit(this.value);" value="'.$idlayanan.'"><i class="fa fa-edit"></i></button>
						<button class="merah" onclick="hapus(this.value);" value="'.$idlayanan.'"><i class="fa fa-trash"></i></button>'.
				 	"</td>".
				 "</tr>";
		}
		?>
	</tbody>
</table>