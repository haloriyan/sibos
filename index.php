<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1">
	<title>SiBOS Laundry</title>
	<link href="aset/fw/build/fw.css" rel="stylesheet">
	<link href="aset/css/style.index.css" rel="stylesheet">
	<link href="aset/fw/build/font-awesome.min.css" rel="stylesheet">
	<script src="http://cdn.riyansatria.tk/embo.js"></script>
</head>
<body>

<div class="bg" style="display: block;"></div>
<div class="container">
	<div class="wrap">
		<h1>Login</h1>
		<div>
			<div class="isi">Username :</div>
			<input type="text" class="box" id="uname">
			<div class="isi">Password :</div>
			<input type="password" class="box" id="pwd">
			<div class="bag-tombol" id="resultLogin">
				<button class="biru" id="login">LOGIN</button>
			</div>
		</div>
	</div>
</div>

<script>
	klik("#login", function() {
		tulis("#login", "<i class='fa fa-spinner'></i> sedang login...");
		var uname = pilih("#uname").value;
		var pwd = pilih("#pwd").value;
		var log = 'uname='+uname+'&pwd='+pwd;
		pos("aksi/login.php", log, function() {
			tulis("#login", "<i class='fa fa-check'></i> berhasil login");
			ambil("aksi/load/resultLogin.php", function(respon) {
				tulis("#resultLogin", respon);
				setTimeout(function() {
					mengarahkan("./pages/cek-role.php");
				}, 1500);
			});
		});
		return false;
	});
</script>

</body>
</html>