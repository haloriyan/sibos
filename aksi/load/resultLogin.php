<?php

$kuki = $_COOKIE['kukiLogin'];
echo $kuki;
if($kuki == "Username / Password Salah") { ?>
	<script>
		setTimeout(function() {
			document.location = "./";
		}, 1500);
	</script>
	<?php
}