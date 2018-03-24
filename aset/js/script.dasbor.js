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
function munculPopup(sel) {
	muncul(".bg");
	muncul(sel);
	setTimeout(function() {
		pengaya(sel + " .popup", "top:0px;");
	}, 50);
}
function hilangPopup(sel) {
	hilang(".bg");
	pengaya(sel + " .popup", "top:-550%;");
	setTimeout(function() {
		hilang(sel);
	}, 250);
}

klik("#logout", function() {
	mengarahkan("./logout");
});
function toIdr(angka) {
	var rupiah = "";
	var angkarev = angka.toString().split('').reverse().join('');
	for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
	return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
}