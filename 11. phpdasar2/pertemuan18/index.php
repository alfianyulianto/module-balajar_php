<?php 
session_start();
if ( !isset($_SESSION['login']) ) {
	header("Location:login.php");
	exit;
}
require "functions.php";

$jumlahDataPerHalaman = 2;
if ( isset($_GET['keyword']) ) {
	$_SESSION['keyword'] = $_GET['keyword'];
	// $keyword = $_SESSION['keyword'];
}

if ( isset($_SESSION['keyword']) ) {
	$keyword = $_SESSION['keyword'];
	// ambil data dari keyword dan cek jumlah data yang dicari berdasakna keyword
	$jumlahData = count( cari($keyword) );
	$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
	if ( isset($_SESSION['keyword']) ) {
		if ( isset($_GET['halaman']) ) {
			$halamanAktif = $_GET['halaman'];
		}else{
			$halamanAktif = 1;
		}		
	}
	$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
	$mahasiswa = query("SELECT * FROM mahasiswa WHERE 
		nama LIKE '%$keyword%' OR 
		nim LIKE '%$keyword%' OR 
		email LIKE '%$keyword%' OR 
		jurusan LIKE '%$keyword%'
		LIMIT $awalData, $jumlahDataPerHalaman");

	// unset sission
	// unset($_SESSION['keyword']);
	} else{
	// count digunakan untuk mengitung berapa element pada array 
	$jumlahData = count(query("SELECT * FROM mahasiswa"));
	$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
	$halamanAktif = ( isset($_GET['halaman']) ) ? $_GET['halaman'] : 1;
	$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
	$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");
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

<form action="" method="get">
	<input type="text" name="keyword" size="40" autofocus placeholder="masukan keyword pencarian.." autocomplete="off">
	<button type="submit">Cari</button>
</form>
<br><br>

<?php if( $halamanAktif > 1 ) : ?>
	<?php if ( isset($_SESSION['keyword']) ): ?>
		<a href="?keyword=<?= $keyword; ?>&halaman=<?= $halamanAktif - 1; ?>">&lt</a>
		<!-- <?php unset($_SESSION['keyword']); ?> -->
	<?php else: ?>
		<a href="?halaman=<?= $halamanAktif - 1; ?>">&lt</a>
	<?php endif ?>
<?php endif;?>
<?php for( $i = 1; $i <= $jumlahHalaman ; $i++ ) : ?>
	<?php if( $i == $halamanAktif ) : ?>
		<?php if ( isset($_SESSION['keyword']) ): ?>
			<a href="?keyword=<?= $keyword; ?>&halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
			<!-- <?php unset($_SESSION['keyword']); ?> -->
		<?php else: ?>
			<a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
		<?php endif ?>
	<?php else : ?>
		<?php if ( isset($_SESSION['keyword']) ): ?>
			<a href="?keyword=<?= $keyword; ?>&halaman=<?= $i; ?>"><?= $i; ?></a>
			<!-- <?php unset($_SESSION['keyword']); ?> -->
		<?php else: ?>
			<a href="?halaman=<?= $i; ?>"><?= $i; ?></a>	
		<?php endif ?>
	<?php endif;?>
	
<?php endfor;?>
<?php if( $halamanAktif < $jumlahHalaman ) : ?>
	<?php if ( isset($_SESSION['keyword']) ): ?>
		<a href="?keyword=<?= $keyword; ?>&halaman=<?= $halamanAktif + 1; ?>">&gt</a>
		<!-- <?php unset($_SESSION['keyword']); ?> -->
	<?php else: ?>
		<a href="?halaman=<?= $halamanAktif + 1; ?>">&gt</a>
	<?php endif ?>
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