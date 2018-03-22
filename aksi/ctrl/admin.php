<?php
include 'koneksi.php';

class admin extends connection {
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
		$r = mysqli_fetch_array($q);
		return $r[$struktur];
	}
}

$admin = new admin();