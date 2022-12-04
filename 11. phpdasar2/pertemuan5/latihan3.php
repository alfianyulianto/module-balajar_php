<?php 
// Array numerik : array yang indeksnya angka
$mahasiswa = ["Alfian", "L200180121", "Informatika", "alfianyulianto.00@gmail.com"];

// Array multidimensi
$dosen = [
	["Budi", "090", "Informatika", "budi@gmail.com"],
	["Andi", "091", "Informatika", "andi@gmail.com"],
	["Muhammad", "078", "Informatika", "anjas@gmail.com"]
];


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Daftra Mahasiswa</title>
</head>
<body>
	<h1>Daftar Mahasiswa</h1>
<!-- Array Numerik -->
	<!-- <ul>
		<?php foreach( $mahasiswa as $mhs ) : ?>
			<li><?= $mhs; ?></li>
		<?php endforeach; ?>
	</ul> -->

	<!-- <ul>
		<li><?= $mahasiswa[0]; ?></li>
		<li><?= $mahasiswa[1]; ?></li>
		<li><?= $mahasiswa[2]; ?></li>
		<li><?= $mahasiswa[3]; ?></li>
	</ul> -->

<!-- Array Multidimensi -->
	<!-- <?php foreach( $dosen as $dsn ) : ?>
		<ul>
		<?php foreach( $dsn as $d ) : ?>
			<li><?= $d; ?></li>
		<?php endforeach; ?>
		</ul>
	<?php endforeach; ?> -->

	<!-- 	<?php foreach( $dosen as $dsn ) : ?>
		<ul>
			<li>Nama : <?= $dsn[0]; ?></li>
			<li>NIM : <?= $dsn[1]; ?></li>
			<li>Jurusan : <?= $dsn[2]; ?></li>
			<li>Email : <?= $dsn[3]; ?></li>
		</ul>
	<?php endforeach; ?>
 -->
	<?php for( $i = 0; $i < count($dosen); $i++ ) : ?>
		<ul>
		<?php for( $j = 0; $j < count($dosen[$i]); $j++ ) : ?>
				<li><?= $dosen[$i][$j]; ?></li>
		<?php endfor; ?>
		</ul>
	<?php endfor ?>
</body>
</html>