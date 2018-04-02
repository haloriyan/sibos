<?php

$role = $_GET['role'];
$bag = $_GET['bag'];

if($role == "" and $bag == "") {
	include 'index.php';
}else if($bag == "") {
	include 'pages/'.$role.'/dasbor.php';
}else {
	include 'pages/'.$role.'/'.$bag.'.php';
}