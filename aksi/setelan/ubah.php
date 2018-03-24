<?php
include '../ctrl/setelan.php';

$note = $_POST['note'];

$setelan->ubah("catatan", $note);