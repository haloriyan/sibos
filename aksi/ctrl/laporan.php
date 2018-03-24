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
}

$report = new report();

?>