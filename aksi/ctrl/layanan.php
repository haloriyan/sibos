<?php
include 'koneksi.php';

class layanan extends connection {
	public function info($id, $struktur) {
		$q = mysqli_query($this->konek, "SELECT $struktur FROM layanan WHERE idlayanan = '$id'");
		$r = mysqli_fetch_array($q);
		return $r[$struktur];
	}
	public function all($q) {
		$q = mysqli_query($this->konek, "SELECT * FROM layanan WHERE nama LIKE '%$q%' ORDER BY nama DESC");
		if(mysqli_num_rows($q) == 0) {
			echo "Layanan tidak ditemukan";
			exit();
		}else {
			while($r = mysqli_fetch_array($q)) {
				$hasil[] = $r;
			}
			return $hasil;
		}
	}
	public function tambah($a, $b, $c, $d) {
		$q = mysqli_query($this->konek, "INSERT INTO layanan VALUES('$a','$b','$c','$d')");
		return $q;
	}
	public function hapus($id) {
		$q = mysqli_query($this->konek, "DELETE FROM layanan WHERE idlayanan = '$id'");
		return $q;
	}
	public function ubah($id, $struktur, $val) {
		$q = mysqli_query($this->konek, "UPDATE layanan SET $struktur = '$val' WHERE idlayanan = '$id'");
		return $q;
	}
}

$layanan = new layanan();