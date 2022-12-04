// console.log('ok');
// fungsi conlose digunakan untuk menampilkan pesan pada console javascripts

// ambil element yang dibutuhkan
// menggunakan teknik penelusuran DOM
var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol-cari');
var container = document.getElementById('container');

// triger digunakan untuk menjalankan ajax
// di JS itu namanya Event
// addEventListener 
// click, dblclick, mouseover, keypress, keyup
// keypress : jika mengetikan sesuatu di dalam inputnya
// keyup : ketika melepaskan tangan ke keyboard
// tambahkan event ketika keyword ditulis
keyword.addEventListener('keyup', function(){
	// untuk mengambil apa yang ditulis di dalam input
	// .value : mengambil input keyword yang diketikan di dalam input
	// console.log(keyword.value);

	// buat objek ajax
	// XMLHttpRequest() : merupakan sebuah object ajax
	var xhr = new XMLHttpRequest();

	// cek kesiapan ajax
	xhr.onreadystatechange = function(){
		// untuk ready state 1-4
		// 0 untuk membuka koneksi, 1 untuk inisialiasi, 4 artinya sumber sudah ready
		// untuk status jika 200 bersrti sumbernya sudah ok
		// kalok 404 berarti sumbernya tidak ada
		if( xhr.readyState == 4 && xhr.status == 200 ){
			// console.log('ajax ok!!');
			// responseText : berisi apapun dari sumbernya
			// sumbernya coba.txt
			// console.log(xhr.responseText);
			// innerHTMl artinya ganti isi dari container
			container.innerHTML = xhr.responseText;
		}
	}

	// eksekusi ajax
	// open() : digunakan untuk membuka koneksi ajaxnya
	// xhr.open("GET", "ajax/mahasiswa.php", true);
	// ada beberapa parameter pertama request method bisa get atau post, 
	// kedua sumber data darimana, 
	// ketiga mau syncronuse atau asyncronuse jika true maka asyncronuse jika false maka syncronuse
	// tanda + pada JS artinya merupakan penggabungan kata
	xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true);

	// send() : digunakan untuk menjalankan ajaxnya
	xhr.send();
});