<?php 
echo $_COOKIE['nama'];



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Percobaan COOKIE</title>
</head>
<body>
<?php if( isset($_COOKIE['nama']) ) : ?>
	<a href="halaman3.php">Hapus Cookie</a>
<?php endif;?>
</body>
</html>