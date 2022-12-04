<?php 
// ambil data di URL
$id = $_GET['id'];

// query data mahasiswa berdasarkan id
// $mahasiswa = query("SELECT * FROM mahasiswa WHERE id = $id")[0];
$conn = mysqli_connect("localhost", "root", "", "phpdasar");
$result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id = $id");
$rows = mysqli_fetch_assoc($result);

// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST['submit']) ) {
	// cek apakah data berhasil ubah atau tidak
	if ( ubah($_POST) > 0 ) {
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
<form action="" method="post">
	<ul>
		<input type="hidden" name="id" value="<?= $rows["id"]; ?>">
		<li>
			<label for="nim">NIM : </label>
			<input type="text" name="nim" id="nim" required value="<?= $rows["nim"]; ?>">
		</li>
		<li>
			<label for="nama">Nama : </label>
			<input type="text" name="nama" id="nama" required value="<?= $rows["nama"]; ?>">
		</li>
		<li>
			<label for="email">Email : </label>
			<input type="text" name="email" id="email" required value="<?= $rows["email"]; ?>">
		</li>
		<li>
			<label for="jurusan">Jurusan : </label>
			<input type="text" name="jurusan" id="jurusan" required value="<?= $rows["jurusan"]; ?>">
		</li>
		<li>
			<label for="gambar">Gambar : </label>
			<input type="text" name="gambar" id="gambar" required value="<?= $rows["gambar"]; ?>">
		</li>
		<li>
			<button type="submit" name="submit">Ubah Data!</button>
		</li>
	</ul>
</form>

</body>
</html>