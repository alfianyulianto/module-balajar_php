<?php 
require "functions.php";

// ambil data di URL
$id = $_GET['id'];

// query data mahasiswa berdasarkan id
$mahasiswa = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST['submit']) ) {
	// cek apakah data berhasil ubah atau tidak
	if ( ubah($_POST) >= 0 ) {
		echo "<script>
			alert('data berhasil ubah!');
			document.location.href = 'index.php';
		</script>";
	}else{
		echo "<script>
			alert('data gagal ubah!');
			document.location.href = 'index.php';
		</script>";
	}
}




?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ubah Data Mahasiswa</title>
</head>
<body>
<h1>Ubah Data Mahasiswa</h1>
<form action="" method="post" enctype="multipart/form-data">
	<ul>
		<input type="hidden" name="id" value="<?= $mahasiswa["id"]; ?>">
		<input type="hidden" name="gambarLama" value="<?= $mahasiswa["gambar"]; ?>">

		<li>
			<label for="nim">NIM : </label>
			<input type="text" name="nim" id="nim" required value="<?= $mahasiswa["nim"]; ?>">
		</li>
		<li>
			<label for="nama">Nama : </label>
			<input type="text" name="nama" id="nama" required value="<?= $mahasiswa["nama"]; ?>">
		</li>
		<li>
			<label for="email">Email : </label>
			<input type="text" name="email" id="email" required value="<?= $mahasiswa["email"]; ?>">
		</li>
		<li>
			<label for="jurusan">Jurusan : </label>
			<input type="text" name="jurusan" id="jurusan" required value="<?= $mahasiswa["jurusan"]; ?>">
		</li>
		<li>
			<label for="gambar">Gambar : </label>
			<img src="img/<?= $mahasiswa["gambar"]; ?>" width="30px" height="30px">
			<input type="file" name="gambar" id="gambar">
		</li>
		<li>
			<button type="submit" name="submit">Ubah Data!</button>
		</li>
	</ul>
</form>

</body>
</html>