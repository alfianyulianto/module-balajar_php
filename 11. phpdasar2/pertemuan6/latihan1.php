<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Latihan Array</title>
	<style>
		.kotak{
			width: 30px;
			height: 30px;
			background-color: #BADA55;
			text-align: center; /*tulisan berada di tengah ini secara horisontal*/
			line-height: 30px; /*tulisan derada di tengah ini secara vertikal*/
			margin: 3px;
			float: left; /*supaya tulisan berjajar ke sebelah kanan*/
			transition: 1s;
		}
		.kotak:hover{
			transform: rotate(360deg);
			border-radius: 50%;
		}
		.clear{
			clear: both;
		}
	</style>
</head>
<body>

<?php 
$angka = [
		[1,2,3],
		[4,5,6],
		[7,8,9]
	];
?>

	<?php foreach( $angka as $a ) : ?>
		<?php foreach( $a as $b ) : ?>
			<div class="kotak"><?= $b; ?></div>
		<?php endforeach; ?>
		<div class="clear"></div>
	<?php endforeach; ?>

</body>
</html>