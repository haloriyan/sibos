<?php
include '../ctrl/layanan.php';

$id = $_COOKIE['idlayanan'];

$layanan->hapus($id);