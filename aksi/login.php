<?php
include 'ctrl/admin.php';

$uname = $_POST['uname'];
$pwd = $_POST['pwd'];

$admin->login($uname, $pwd);
?>