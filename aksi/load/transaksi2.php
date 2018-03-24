<table>
	<thead>
		<tr>
			<th class="biru" style="width: 10%;">ID</th>
			<th class="biru">Nama</th>
			<th class="biru">Telepon</th>
			<th class="biru">Alamat</th>
			<th class="biru">Harga</th>
			<th class="biru">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		error_reporting(1);
		include '../ctrl/transaksi.php';
		$key = $conn->cekSesi();
		foreach ($trans->all($key) as $row) {
			$idtransaksi = $row['idtransaksi'];
			$bayar = $row['bayar'];
			$harga = $row['harga'];
			if($bayar < $harga) {
				$styleKhusus = "style='background: rgba(231, 76, 60, 0.7);color: #fff;'";
			}
			echo "<tr ".$styleKhusus.">".
				 	"<td>".$row['idtransaksi']."</td>".
				 	"<td>".$row['nama']."</td>".
				 	"<td>".$row['telepon']."</td>".
				 	"<td>".$row['alamat']."</td>".
				 	"<td>".$row['harga']."</td>".
				 	"<td>".
				 		'<button class="hijau" onclick="edit(this.value);" value="'.$idtransaksi.'"><i class="fa fa-edit"></i></button>
						<button class="kuning" onclick="lihat(this.value);" value="'.$idtransaksi.'"><i class="fa fa-eye"></i></button>'.
				 	"</td>".
				 "</tr>";
		}
		?>
	</tbody>
</table>