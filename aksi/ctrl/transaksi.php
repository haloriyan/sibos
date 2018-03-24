<?php
include 'admin.php';

class transaksi extends admin {
	public function info($id, $struktur) {
		$q = mysqli_query($this->konek, "SELECT $struktur FROM transaksi WHERE idtransaksi = '$id'");
		$r = mysqli_fetch_array($q);
		return $r[$struktur];
	}
	public function all($adm) {
		if($adm == "") {
			$tambahan = "idadmin LIKE '%$adm%'";
		}else {
			$tambahan = "1";
		}
		$q = mysqli_query($this->konek, "SELECT * FROM transaksi WHERE $tambahan");
		if(mysqli_num_rows($q) == 0) {
			echo "Transaksi kosong";
		}else {
			while($r = mysqli_fetch_array($q)) {
				$hasil[] = $r;
			}
			return $hasil;
		}
	}
	public function insert($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l) {
		$q = mysqli_query($this->konek, "INSERT INTO transaksi VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l')");
		return $q;
	}
	public function ubah($id, $struktur, $val) {
		$q = mysqli_query($this->konek, "UPDATE transaksi SET $struktur = '$val' WHERE idtransaksi = '$id'");
		return $q;
	}
	public function hapus($id) {
		$q = mysqli_query($this->konek, "DELETE FROM transaksi WHERE idtransaksi = '$id'");
		return $q;
	}


	public function layanan() {
		$q = mysqli_query($this->konek, "SELECT * FROM layanan");
		while($r = mysqli_fetch_array($q)) {
			$hasil[] = $r;
		}
		return $hasil;
	}
	public function getLayanan($id, $struktur) {
		$q = mysqli_query($this->konek, "SELECT $struktur FROM layanan WHERE idlayanan = '$id'");
		$r = mysqli_fetch_array($q);
		return $r[$struktur];
	}
}

$trans = new transaksi();