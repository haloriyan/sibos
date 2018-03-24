<?php
include '../ctrl/admin.php';

$id = rand(1,9999);
$nama = $_POST['nama'];
$telepon = $_POST['telepon'];
$alamat = $_POST['alamat'];
$uname = $_POST['uname'];
$pwd = $_POST['pwd'];
$role = strtolower($_POST['role']);

$admin->insert($id, $nama, $telepon, $alamat, $uname, $pwd, $role);