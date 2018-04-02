<?php
include '../ctrl/admin.php';

$id = $_COOKIE['idadmin'];

$admin->delete($id);