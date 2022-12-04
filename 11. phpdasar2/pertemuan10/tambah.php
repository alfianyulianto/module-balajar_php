<?php 
// // koneksi ke database
// $conn = mysqli_connect("localhost", "root", "", "phpdasar");
// // cek apakah tombol submit sudah ditekan atu belum
// if ( isset($_POST['submit']) ) {
// 	// ambil data dari tiap element dalam form
// 	$nim = $_POST['nim'];
// 	$nama = $_POST['nama'];
// 	$email = $_POST['email'];
// 	$jurusan = $_POST['jurusan'];
// 	$gambar = $_POST['gambar'];

// 	// query insert data
// 	$query = "INSERT INTO mahasiswa VALUES('', '$nama', '$nim', '$email', '$jurusan', '$gambar')";
// 	mysqli_query($conn, $query);

// 	// cek apakah data berhasil ditambahkan atau tidak
// 	// mysqli_affected_rows() : menghasilkan sebuah angka, berapa baris yang dipengaruhi. Digunakan untuk mengecek apakah data berhasil ditambahkan atau tidak
// 	// jika error akan menghasilkan nilai -1
// 	// jika berhasil akan menghasilkan nilai 1
// 	if( mysqli_affected_rows($conn) > 0){
// 		echo "berhasil";
// 	}else{
// 		echo "Gagal";
// 		echo "<br>";
// 		mysqli_error($conn);
// 	}


// }
require "functions.php";
// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST['submit']) ) {
	// cek apakah data berhasil ditbambahkan atau tidak
	if ( tambah($_POST) > 0 ) {
		echo "<script>
			alert('data berhasil ditambahkan!');
			document.location.href = 'index.php';
		</script>";
	}else{
		echo "<script>
			alert('data gagal ditambahkan!');
			document.location.href = 'index.php';
		</script>";
	}
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tambah Data Mahasiswa</title>
</head>
<body>
<h1>Tambah Data Mahasiswa</h1>
<form action="" method="post">
	<ul>
		<li>
			<label for="nim">NIM : </label>
			<input type="text" name="nim" id="nim" required/>
		</li>
		<li>
			<label for="nama">Nama : </label>
			<input type="text" name="nama" id="nama" required/>
		</li>
		<li>
			<label for="email">Email : </label>
			<input type="text" name="email" id="email" required/>
		</li>
		<li>
			<label for="jurusan">Jurusan : </label>
			<input type="text" name="jurusan" id="jurusan" required/>
		</li>
		<li>
			<label for="gambar">Gambar : </label>
			<input type="text" name="gambar" id="gambar" required/>
		</li>
		<li>
			<button type="submit" name="submit">Tambah Data!</button>
		</li>
	</ul>
</form>

</body>
</html>