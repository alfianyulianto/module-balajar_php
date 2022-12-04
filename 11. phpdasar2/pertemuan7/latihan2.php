<?php 
// cek apakah tidak ada data di $_GET
if ( !isset($_GET["nama"]) || 
	!isset($_GET["nim"]) || 
	!isset($_GET["email"]) ||
	!isset($_GET["jurusan"]) ||
	!isset($_GET["gambar"])) {
	// redirect memindahkan user dari sebuah halaman ke halaman yang lain
	header("Location:latihan1.php");
	exit; // digunakan supaya skrip di bawah tidak dieksekusi
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Detail Mahasiswa</title>
</head>
<body>
	<ul>
		<img src="img/<?= $_GET["gambar"]; ?>">
		<li><?= $_GET['nama']; ?></li>
		<li><?= $_GET['nim']; ?></li>
		<li><?= $_GET['email']; ?></li>
		<li><?= $_GET['jurusan']; ?></li>
	</ul>

	<a href="latihan1.php">Kembali ke latihan 1</a>
</body>
</html>