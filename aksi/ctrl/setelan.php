<?php
include 'admin.php';

class setelan extends admin {
	public function catatan() {
		$q = mysqli_query($this->konek, "SELECT catatan FROM konfigurasi");
		$r = mysqli_fetch_array($q);
		return $r['catatan'];
	}
	public function logo() {
		$q = mysqli_query($this->konek, "SELECT logo FROM konfigurasi");
		$r = mysqli_fetch_array($q);
		return $r['logo'];
	}
	public function ubah($str, $val) {
		$q = mysqli_query($this->konek, "UPDATE konfigurasi SET $str = '$val'");
		return $q;
	}
}

$setelan = new setelan();