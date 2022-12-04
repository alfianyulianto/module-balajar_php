<?php 
session_start();
if ( !isset($_SESSION['login']) ) {
	header("Location:login.php");
	exit;
}
require "functions.php";

// paginaton
// digunakan untuk menentukan dalam satu halaman akan tampil berapa data
// LIMIT : pada query untuk digunakan untuk membatasi jumlah data yang tampil
// LIMIT memiliki 2 nilai
// nilai pertama adalah itu datanya dimulai dari dari data ke berapa
// nilai kedua adalah untuk menentukan mau berapa data yang mau ditampilkan

// konfiguras
// cara pertama
// $jumlahDataPerHalaman = 2;
// $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
// $jumlahData = mysqli_num_rows($result);

// tombol cari ditekan

// cara kedua
$jumlahDataPerHalaman = 2;
// count digunakan untuk mengitung berapa element pada array 
$jumlahData = count(query("SELECT * FROM mahasiswa"));
// pembulatan data pada pada php ada beberapa jenis
// round(value) : membulatkan bilangan pecahan ke desimal terdekatnya
// Contoh 6 dibagi 5 = 1.2, maka akan dibulatkan menjadi 1. Jika 6 dibagi 4 = 1.5, maka akan dibulatkan ke atas menjadi 2.

// floor(value) : membulatkan bilangan pecahan ke bawah
// Contoh 6 dibagi 5 = 1.2, maka akan dibulatkan menjadi 1. Jika 6 dibagi 4 = 1.5, maka akan dibulatkan ke bawah menjadi 1.

// ceil(value) : membulatkan bilangan pecahan ke atas
// Contoh 6 dibagi 5 = 1.2, maka akan dibulatkan menjadi 2. Jika 6 dibagi 4 = 1.5, maka akan dibulatkan ke atas menjadi 2.

$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);

$halamanAktif = ( isset($_GET['halaman']) ) ? $_GET['halaman'] : 1;

// jumlahDataPerHalaman = 2
// Halaman = 1, indek data = 0 -> awal data ke 3
// Halaman =  2, index data = 2 -> awal data ke 3
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");
if ( isset($_POST['cari']) ) {
	$mahasiswa = cari($_POST['keyword']);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Halaman Admin</title>
</head>
<body>

<a href="logout.php">Logout</a>

<h1>Daftar Mahasiswa</h1>

<a href="tambah.php">Tambah data mahasiswa</a>
<br><br>

<form action="" method="post">
	<input type="text" name="keyword" size="40" autofocus placeholder="masukan keyword pencarian.." autocomplete="off">
	<button type="submit" name="cari">Cari</button>
</form>
<br><br>

<!-- navigasi -->
<!-- &lt : digunkaan untuk memberikan tanda kurang dari -->
<!-- atau bisa menggunakan &laquo. ini akan meghasilkan tanda << -->
<?php if( $halamanAktif > 1 ) : ?>
		<a href="?halaman=<?= $halamanAktif - 1; ?>">&lt</a>
<?php endif;?>
<?php for( $i = 1; $i <= $jumlahHalaman ; $i++ ) : ?>
	<?php if( $i == $halamanAktif ) : ?>
			<a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
	<?php else : ?>
			<a href="?halaman=<?= $i; ?>"><?= $i; ?></a>	
	<?php endif;?>
	
<?php endfor;?>
<!-- &gt : digunkana untuk memberikan tanda lebih besar dari -->
<!-- atau bisa menggunakan &raquo. ini akan menghasilkan tanda >> -->
<?php if( $halamanAktif < $jumlahHalaman ) : ?>
	<a href="?halaman=<?= $halamanAktif + 1; ?>">&gt</a>	
<?php endif;?>

<br>

<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<th>No.</th>
		<th>Aksi</th>
		<th>Gambar</th>
		<th>NIM</th>
		<th>Nama</th>
		<th>Email</th>
		<th>Jurusan</th>
	</tr>
	<?php $i = 1; ?>
	<?php foreach( $mahasiswa as $row ) : ?>
		<tr>
		<td><?= $i; ?></td>
		<td>
			<a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |
			<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">Hapus</a>
		</td>
		<td><img src="img/<?= $row["gambar"]; ?>" width="50px" height="50px"></td>
		<td><?= $row["nim"]; ?></td>
		<td><?= $row["nama"]; ?></td>
		<td><?= $row["email"]; ?></td>
		<td><?= $row["jurusan"]; ?></td>
	</tr>
	<?php $i++; ?>
	<?php endforeach;?>


</table>


</body>
</html>