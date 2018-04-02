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
		<?php
		error_reporting(1);
		include '../ctrl/pelanggan.php';
		$key = $_COOKIE['qCari'];
		foreach ($pelanggan->all($key) as $row) {
			$idpelanggan = $row['idpelanggan'];
			echo "<tr>".
				 	"<td>".$row['idpelanggan']."</td>".
				 	"<td>".$row['nama']."</td>".
				 	"<td>".$row['telepon']."</td>".
				 	"<td>".$row['alamat']."</td>".
				 	"<td>".
				 		'<button class="hijau" onclick="edit(this.value);" value="'.$idpelanggan.'"><i class="fa fa-edit"></i></button>
						<button class="merah" onclick="hapus(this.value);" value="'.$idpelanggan.'"><i class="fa fa-trash"></i></button>'.
				 	"</td>".
				 "</tr>";
		}
		?>
	</tbody>
</table>