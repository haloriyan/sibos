<?php
include 'koneksi.php';

class pelanggan extends connection {
	public function info($id, $struktur) {
		$q = mysqli_query($this->konek, "SELECT $struktur FROM pelanggan WHERE idpelanggan = '$id'");
		$r = mysqli_fetch_array($q);
		return $r[$struktur];
	}
	public function all($q) {
		$q = mysqli_query($this->konek, "SELECT * FROM pelanggan WHERE nama LIKE '%$q%' OR alamat LIKE '%$q%' OR telepon LIKE '%$q%' ORDER BY added DESC");
		if(mysqli_num_rows($q) == 0) {
			echo "Pelanggan tidak ditemukan";
			exit();
		}else {
			while($r = mysqli_fetch_array($q)) {
				$hasil[] = $r;
			}
			return $hasil;
		}
	}
	public function tambah($a, $b, $c, $d, $e) {
		$q = mysqli_query($this->konek, "INSERT INTO pelanggan VALUES('$a','$b','$c','$d','$e')");
		return $q;
	}
	public function ubah($id, $struktur, $val) {
		$q = mysqli_query($this->konek, "UPDATE pelanggan SET $struktur = '$val' WHERE idpelanggan = '$id'");
		return $q;
	}
	public function hapus($id) {
		$q = mysqli_query($this->konek, "DELETE FROM pelanggan WHERE idpelanggan = '$id'");
		return $q;
	}
}

$pelanggan = new pelanggan();