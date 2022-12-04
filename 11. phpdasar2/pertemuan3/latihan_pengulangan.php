<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Latihan Pengulangan</title>
</head>
<body>

<table border="1" cellpadding="10" cellspacing="0">
	<?php 
		for( $i = 1; $i <= 3; $i++ ) {
			echo "<tr>";
				for ($j= 1; $j <= 5; $j++) { 
					echo "<td>$i,$j</td>";
				}
			echo "</tr>";
		}
	?>

	<!-- <?php 
	 	$i = 1;
		while ( $i <= 3 ) {
			echo "<tr>";
			$j = 1;
			while ( $j <= 5 ) {
				echo "<td>$i,$j</td>";
			$j++;
			}
			echo "</tr>";
		$i++;
		}
	?> -->

	<!-- <?php
		$i = 1;
		do{
			echo "<tr>";
				$j = 1;
				do{
					echo "<td>$i,$j</td>";
				$j++;
				}while( $j <= 5 );
			echo "</tr>";
		$i++;
		}while( $i <= 3 );
	?> -->

<!-- GAYA TEMPLETING -->

	<!-- <?php for ( $i=1; $i <= 3; $i++ ) : ?>
		<tr>
			<?php for ( $j=1; $j <= 5; $j++ ) : ?>
				<td><?= "$i,$j"; ?></td>
			<?php endfor; ?>
		</tr>
	<?php endfor; ?> -->

	<!-- <?php 
	$i = 1;
	while ( $i <= 3 ) : ?>
		<tr>
			<?php 
			$j = 1;
			while ( $j <= 5 ) : ?>
				<td><?= "$i,$j"; ?></td>
			<?php
			$j++;
			endwhile; ?>
		</tr>
	<?php 
	$i++;
	endwhile; ?> -->

	<!-- <?php 
	$i = 1;
	do{?>
		<tr>
			<?php 
			$j = 1;
			do{ ?>
				<td><?= "$i,$j"; ?></td>
			<?php 
			$j++;
			}
			while( $j <= 5 );
			?>
		</tr>
	<?php 
	$i++;
	}
	while( $i <= 3 ); ?> -->

</table>

</body>
</html>