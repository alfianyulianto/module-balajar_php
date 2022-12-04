<?php 
// Array Associative
// sebuah variabel yang bisa memiliki banyak nilai
// pasangan antara key dan value
// key-nya adalah string yang kita buat sendiri

// cara memasukan data ke array associative
$dosen = ["nama" => "Sandhika Galih"];
var_dump($dosen);
echo "<br>";
$dosen["NIP"] = "0919";
var_dump($dosen);
$mahasiswa = [
	[
		"nama" => "Alfian Yulianto", 
		"nim" => "L200180121", 
		"email" => "alfianyulianto36@gmail.com",
		"jurusan" => "Teknik Informatika",
		"gambar" => "alfian.png"
	],
	[
		"nama" => "Budi Santosa", 
		"nim" => "B200180001", 
		"email" => "budi@gmail.com", 
		"jurusan" => "Akutansi",
		"gambar" => "budi.png"
	],
	[
		"nama" => "Vincent David", 
		"nim" => "B100180002", 
		"email" => "david@gmail.com", 
		"jurusan" => "Teknik Sipil",
		"gambar" => "david.png"
	],
	[
		"nama" => "Diah Ramadhani", 
		"nim" => "D210180180", 
		"email" => "diah@gmail.com", 
		"jurusan" => "Teknik Informatika",
		"gambar" => "diah.png"
	],
	[
		"nama" => "Erika Ima", 
		"nim" => "D200180020", 
		"email" => "erika.ima@gmail.com", 
		"jurusan" => "Teknik Kimia",
		"gambar" => "erika.png",
		"tugas" => [90, 95, 100]
	]
];

// echo $mahasiswa[1]["jurusan"];
// echo $mahasiswa[4]["tugas"][2];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Daftra Mahasiswa</title>
</head>
<body>
	<h1>Daftar Mahasiswa</h1>

	<?php foreach( $mahasiswa as $mhs ) : ?>
		<ul>
			<li>
				<img src="img/<?= $mhs["gambar"]; ?>" hight="100px" width="100px">
			</li>
			<li>Nama : <?= $mhs["nama"]; ?></li>
			<li>NIM : <?= $mhs["nim"]; ?></li>
			<li>Email : <?= $mhs["email"]; ?></li>
			<li>Jurusan : <?= $mhs["jurusan"]; ?></li>
		</ul>
	<?php endforeach; ?>

</body>
</html>