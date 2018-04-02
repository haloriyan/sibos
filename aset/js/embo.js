/*
	* EmboJS v1.0.0
	* Created by Riyan Satria (c) 2018
	* Licensed open-source under General Public License 3.0
*/

function pilih(select) {
	var dom = document.querySelector(select);
	return dom;
}

function klik(select, aksi) {
	var dom = pilih(select);
	dom.addEventListener("click", aksi);
}

function klikGanda(select, aksi) {
	var dom = pilih(select);
	dom.addEventListener("dblclick", aksi);
}

function tulis(select, txt) {
	var dom = pilih(select);
	dom.innerHTML = txt;
}

function hilang(select) {
	var dom = pilih(select);
	dom.style.display = "none";
}

function muncul(select) {
	var dom = pilih(select);
	dom.style.display = "block";
}

function mengarahkan(tujuan) {
	document.location = tujuan;
}

// Ajax Handler
function pos(url, data, efek) {
	var xhr = new XMLHttpRequest();
	xhr.open("POST", url, true);

	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.onreadystatechange = function() {
		if(xhr.readyState == 4 && xhr.status == 200) {
			efek();
		}else {
			// console.log("gagal mengirim data");
		}
	}
	xhr.send(data);
}

function ambil(url, sukses) {
	var xhr = new XMLHttpRequest();
	xhr.open('GET', url, true);
	xhr.onreadystatechange = function() {
		if(xhr.readyState == XMLHttpRequest.DONE) {
			var respon = xhr.responseText;
			return sukses(respon);
		}else {
			// console.log("gagal mengambil data");
		}
	}
	xhr.send(null);
}

// Styling
function pengaya(select, style) {
	var dom = pilih(select);
	dom.setAttribute("style", style);
}

// Keyboard Event
function tekan(key, fungsi) {
	document.onkeydown = function(e) {
		if(e.key == key) {
			fungsi();
		}
	}
}