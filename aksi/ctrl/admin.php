<?php
include 'koneksi.php';

class admin extends connection {
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
			header("location: ../");
		}else {
			return $this->sesi;
		}
	}
	public function login($u, $p) {
		$q = mysqli_query($this->konek, "SELECT username,password FROM admin WHERE username = '$u' AND password = '$p'");
		if(mysqli_num_rows($q) == 0) {
			setcookie('kukiLogin', 'Username / Password Salah', time() + 50, "/");
		}else {
			setcookie('kukiLogin', 'Berhasil login', time() + 50, "/");
			session_start();
			$_SESSION['sibos']=$u;
		}
	}
	public function info($u, $struktur) {
		$q = mysqli_query($this->konek, "SELECT $struktur FROM admin WHERE username = '$u'");
		if(mysqli_num_rows($q) == 0) {
			$q = mysqli_query($this->konek, "SELECT $struktur FROM admin WHERE idadmin = '$u'");
		}
		$r = mysqli_fetch_array($q);
		return $r[$struktur];
	}
	public function all($role) {
		if($role == "") {
			$custom = "";
		}else {
			$custom = "WHERE role = '$role'";
		}
		$q = mysqli_query($this->konek, "SELECT * FROM admin $custom");
		while($r = mysqli_fetch_array($q)) {
			$hasil[] = $r;
		}
		return $hasil;
	}
	public function insert($a, $b, $c, $d, $e, $f, $g) {
		$q = mysqli_query($this->konek, "INSERT INTO admin VALUES('$a','$b','$c','$d','$e','$f','$g')");
		return $q;
	}
	public function change($id, $struktur, $val) {
		$q = mysqli_query($this->konek, "UPDATE admin SET $struktur = '$val' WHERE idadmin = '$id'");
		return $q;
	}
	public function delete($id) {
		$q = mysqli_query($this->konek, "DELETE FROM admin WHERE idadmin = '$id'");
		return $q;
	}
}

$admin = new admin();