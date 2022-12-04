<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>POST</title>	
</head>
<body>

<?php if( isset($_POST['submit']) ) : ?>
<h1>Hallo, Selamat Datang <?= $_POST["nama"]; ?></h1>
<?php endif; ?>

<!-- Form -->
<!-- memiliki atribut action dan method -->
<!-- jika action kosong maka data pada form tersebut dikirim ke halaman ini sendiri -->
<!-- jika method kosong maka nilai defaultnya get -->

<form action="latihan4.php" method="post">
	Masukan nama :
	<input type="text" name="nama">
	<br>
	<button type="submit" name="submit">Kirim</button>
</form>
<!-- <form action="" method="post">
	Masukan nama :
	<input type="text" name="nama">
	<br>
	<button type="submit" name="submit">Kirim</button>
</form> -->
</body>
</html>