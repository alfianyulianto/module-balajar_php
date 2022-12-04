<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Latihan Pengkondisian</title>
	<style>
		.warna-baris{
			background-color: silver;
		}.warna-kolom{
			background-color: black;
		}
	</style>
</head>
<body>
	<table border="1" cellpadding="10" cellspacing="0">
		<?php for ( $i=1; $i <= 5; $i++ ) : ?>
			<?php if ( $i % 2 == 1 ) : ?>
				<tr class="warna-baris">
			<?php else : ?>
				<tr>
			<?php endif; ?>
				<?php for ( $j=1; $j <= 5; $j++ ) : ?>
					<?php if ( $j % 2 == 0 ) : ?>
						<td class="warna-kolom"><?= "$i,$j"; ?></td>
					<?php else : ?>
						<td><?= "$i,$j"; ?></td>
					<?php endif; ?>
				<?php endfor; ?>
			</tr>
	<?php endfor; ?>
	</table> -->
</body>
</html>