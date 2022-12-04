<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// ambil data dari tabel mahasiswa / query data mahasiswa
// dalam menulis sintax SQL gunakan format yang disarakan oleh SQL-nya
// sintax SQL-nya tulisa dalam huruf besar 
// nama tabel dan nama database tulis dalam huru kecil

// mysqli_query : digunakan untuk mengambil data dari sebuah tabel pada database
// ketika akan melaukan QUERY mysqli_query akan mengembalikan 2 hal 
// jika berhasil QUERY-nya akan dilakukan dan mengembalikan nilai true
// jika gagal maka fungsi ini tidak akan menjalankan QUERY-nya dan mengembalikan nilai false
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

// untuk mengecek error atau tidak dari fungsi mysqli_query
// mysqli_error() : digunakan untuk mengecek error dari suatu query. Outputnya berupa string yang memperlihatkan baris errornya
// if ( !$result ) {
// 	echo mysqli_error($conn);
// }

// ambil data (fetch) mahasiswa dari object result
// mysqli_fetch_row() : mengembalikan array numerik
// mysqli_fetch_assoc() : mengembalikan array associative
// mysqli_fetch_array() : mengembalikan keduanya yaitu array numerik dan array associative
// mysqli_fetch_object() : mengembalikan object, shingga tidak punya key numerik maupun associative. Cara memanggilnya dengan cara object yaitu dengan panah
// var_dump($mhs->nama);

// while ( $mhs = mysqli_fetch_assoc($result) ){
// 	var_dump($mhs);
// }




?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Halaman Admin</title>
</head>
<body>
<h1>Daftar Mahasiswa</h1>

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
	<?php while( $row = mysqli_fetch_assoc($result) ) : ?>
		<tr>
		<td><?= $i; ?></td>
		<td>
			<a href="">Ubah</a> |
			<a href="">Hapus</a>
		</td>
		<td><img src="img/<?= $row["gambar"]; ?>" width="50px" height="50px"></td>
		<td><?= $row["nim"]; ?></td>
		<td><?= $row["nama"]; ?></td>
		<td><?= $row["email"]; ?></td>
		<td><?= $row["jurusan"]; ?></td>
	</tr>
	<?php $i++; ?>
	<?php endwhile;?>


</table>


</body>
</html>