<?php 
// $_GET
// metode request GET : merupakan metode pengiriman data melalui url dan data tersebut bisa ditangkap dengan variabel superglobal $_GET
// cara menuliskan metode request GET pada url
// http://localhost/phpdasar2/pertemuan7/latihan1.php?nama=Alfian%20Yulianto&nim=L200180121

// $_GET['nama'] = "Alfian Yulianto";
// var_dump($_GET);
// echo $_GET['nama'];
// echo "<br>";
// $_GET['NIM'] = "L200180121";
// var_dump($_GET);



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

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>GET</title>
</head>
<body>
	<h1>Daftar Mahasiswa</h1>

	<ul>
	<?php foreach( $mahasiswa as $mhs ) : ?>
		<li>
			<a href="latihan2.php?nama=<?= $mhs["nama"]; ?>&nim=<?= $mhs["nim"]; ?>&email=<?= $mhs["email"]; ?>&jurusan=<?= $mhs["jurusan"]; ?>&gambar=<?= $mhs["gambar"]; ?>"> <?= $mhs["nama"]; ?> </a>
		</li>
	<?php endforeach; ?>
	</ul>
</body>
</html>