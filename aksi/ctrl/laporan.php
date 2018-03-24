<?php
include 'admin.php';

class report extends admin {
	public function periode($tgl) {
		$q = mysqli_query($this->konek, "SELECT * FROM transaksi WHERE tgl_masuk LIKE '%$tgl%'");
		if(mysqli_num_rows($q) == 0) {
			echo "<h2>Tidak ada transaksi</h2>";
		}else {
			while($r = mysqli_fetch_array($q)) {
				$hasil[] = $r;
			}
			return $hasil;
		}
	}
	public function totalTrans($tgl) {
		$q = mysqli_query($this->konek, "SELECT idtransaksi FROM transaksi WHERE tgl_masuk LIKE '%$tgl%'");
		$t = mysqli_num_rows($q);
		return $t;
	}
	public function totBelumAmbil() {
		$q = mysqli_query($this->konek, "SELECT idtransaksi FROM transaksi WHERE status = 'Belum diambil'");
		$t = mysqli_num_rows($q);
		return $t;
	}
	public function totNunggak() {
		$q = mysqli_query($this->konek, "SELECT idtransaksi FROM transaksi WHERE bayar < harga");
		$t = mysqli_num_rows($q);
		return $t;
	}
	public function jumlahTransaksi($tgl, $output) {
		if($output == "nominal") {
			$query = "SELECT SUM(harga) FROM transaksi WHERE tgl_masuk LIKE '%$tgl%'";
		}else {
			$query = "SELECT COUNT(idtransaksi) FROM transaksi WHERE tgl_masuk LIKE '%$tgl%'";
		}
		$q = mysqli_query($this->konek, $query);
		$r = mysqli_fetch_array($q);
		return $r;
	}
	public function jumlahKonsumen($tgl) {
		$q = mysqli_query($this->konek, "SELECT * FROM transaksi WHERE tgl_masuk LIKE '%$tgl%' GROUP BY nama");
		$t = mysqli_num_rows($q);
		return $t;
	}
	public function uangDiterima($tgl) {
		$q = mysqli_query($this->konek, "SELECT SUM(bayar) FROM transaksi WHERE tgl_masuk LIKE '%$tgl%'");
		$r = mysqli_fetch_array($q);
		return $r;
	}
	public function uangBlmBayar($tgl) {
		$q = mysqli_query($this->konek, "SELECT SUM(bayar) FROM transaksi WHERE tgl_masuk LIKE '%$tgl%'");
		$r = mysqli_fetch_array($q);

		$q2 = mysqli_query($this->konek, "SELECT SUM(harga) FROM transaksi WHERE tgl_masuk LIKE '%$tgl%'");
		$r2 = mysqli_fetch_array($q2);

		$hitung = $r2[0] - $r[0];
		if($hitung <= 0) {
			return "Lunas semua";
		}else {
			return $hitung;
		}
	}
	public function toIdr($angka) {
		return "Rp. ".strrev(implode(".", str_split(strrev(strval($angka)), 3)));
	}
}

$report = new report();

?>