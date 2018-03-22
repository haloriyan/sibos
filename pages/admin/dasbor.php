<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1">
	<title>Dashboard | SiBOS Laundry</title>
	<link href="../aset/fw/build/fw.css" rel="stylesheet">
	<link href="../aset/fw/build/font-awesome.min.css" rel="stylesheet">
	<link href="../aset/css/style.dasbor.css" rel="stylesheet">
	<script src="http://cdn.riyansatria.tk/embo.js"></script>
</head>
<body>

<div class="atas biru">
	<div id="tblMenu" aksi="bkMenu"><i class="fa fa-bars"></i></div>
	<div class="judul">Dashboard</div>
</div>

<div class="menu">
	<div class="wrap">
		<a href="#" id="active"><li>Dashboard</li></a>
		<a href="#"><li>Transaksi</li></a>
		<a href="#"><li>Laporan</li></a>
		<a href="#"><li>Pelanggan</li></a>
		<a href="#"><li>Karyawan</li></a>
		<a href="#"><li>Layanan</li></a>
	</div>
</div>

<div class="container">
	<div class="wrap">
		<h1>Halo dunia</h1>
	</div>
</div>

<script>
	klik("#tblMenu", function() {
		var aksi = pilih("#tblMenu").getAttribute("aksi");
		if(aksi == "bkMenu") {
			pengaya(".menu", "left:0%");
			pengaya(".atas", "left:25%");
			pengaya(".container", "left:25%");
			pilih("#tblMenu").setAttribute("aksi", "xMenu");
		}else {
			pengaya(".menu", "left:-30%");
			pengaya(".atas", "left:0%");
			pengaya(".container", "left:0%");
			pilih("#tblMenu").setAttribute("aksi", "bkMenu");
		}
	});
</script>

</body>
</html>