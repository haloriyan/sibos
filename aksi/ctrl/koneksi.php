<?php

class connection {
	public function __construct() {
		$this->koneksi();
	}
	public function koneksi() {
		$this->konek = new mysqli("localhost", "root", "", "sibos");
		return $this->konek;
	}
	public function cekSesi() {
		session_start();
		$this->sesi = $_SESSION['sibos'];
		if(empty($this->sesi)) {
			header("location: ./auth");
		}else {
			return $this->sesi;
		}
	}
}