<?php 
// pengulangan pada array
// for / foreach
$angka = [3,2,15,20,11,77,89];



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Latihan 2</title>
	<style>
		.kotak{
			width: 50px;
			height: 50px;
			background-color: salmon;
			text-align: center;
			line-height: 50px;
			margin:3px;
			float: left;
		}
		.clear{
			clear: both;
		}
	</style>
</head>
<body>
	<!-- count : digunakan untuk menghitung banyaknya element pada array -->
	<?php for( $i = 0; $i < count($angka); $i++ ) : ?>
	<div class="kotak"><?php echo $angka[$i]; ?></div>
	<?php endfor; ?>

	<div class="clear"></div>
<!-- foreach untuk setiap elemen yang ada di array lakukan sesuatu -->
	<?php foreach( $angka as $a ) : ?>
	<div class="kotak"><?= $a; ?></div>
	<?php endforeach; ?>

</body>
</html>