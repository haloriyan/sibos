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
		include '../ctrl/admin.php';
		$role = $_COOKIE['roleAdmin'];
		foreach ($admin->all($role) as $row) {
			$idadmin = $row['idadmin'];
			echo "<tr>".
				 	"<td>".$row['idadmin']."</td>".
				 	"<td>".$row['nama']."</td>".
				 	"<td>".$row['telepon']."</td>".
				 	"<td>".$row['alamat']."</td>".
				 	"<td>".
				 		'<button class="hijau" onclick="edit(this.value);" value="'.$idadmin.'"><i class="fa fa-edit"></i></button>
						<button class="merah" onclick="hapus(this.value);" value="'.$idadmin.'"><i class="fa fa-trash"></i></button>'.
				 	"</td>".
				 "</tr>";
		}
		?>
	</tbody>
</table>