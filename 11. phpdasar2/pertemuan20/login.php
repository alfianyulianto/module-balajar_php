<?php 
session_start();
require "functions.php";

// cek cookie

// if ( isset($_COOKIE['login']) ) {
// 	if( $_COOKIE['login'] == 'true' ){
// 		// set session
// 		$_SESSION['login'] = true;
// 	}
// }

if ( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
	$id = $_COOKIE["id"];
	$key = $_COOKIE["key"];

	// ambil username bedasarkan id
	$result = mysqli_query($conn, "SELECT username FROM user WHERE id=$id");

	$row = mysqli_fetch_assoc($result);
	// cek COOKIE dan username
	if( $key === hash('sha256', $row['username']) ) {
		// set session
		$_SESSION['login'] = true;
	}
}

if ( isset($_SESSION['login']) ) {
	header("Location:index.php");
	exit;
}

if ( isset($_POST["login"]) ) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	// cek apakah username dan password ada di dalam database
	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	// cek username
	// mysqli_num_rows() : digunakan untuk menghitung berapa baris yang dikembalikan dari fungsi SELECT
	// jika ada pasti nilainya 1
	// jika tidak ada pasti nilainya 0
	// mysqli_num_rows()
	if ( mysqli_num_rows($result) === 1 ) {
		// cek password
		$row = mysqli_fetch_assoc($result);
		// password_verify() : digunakan untuk mengecek sebuah string sama atau tidak dengan hashnya
		// parameternya ada 2 yaitu
		// parameter 1 string yang belum diacak
		// parameter 2 string yang sudah diacak
		// password_verify(password, hash)
		if( password_verify($password, $row["password"]) ){
			// set session
			$_SESSION['login'] = true;

			// cek remember me
			if ( isset($_POST["remember"]) ) {
			 	// buat cookie

			 	// setcookie('login', 'true', time()+60);

			 	setcookie('id', $row['id'], time()+60);
			 	// hash() : teknik mengacak atau mengenkripsi atau megenerate
			 	// hash(algo, data)
			 	// ada 2 parameter
			 	// parameter pertama mau pakek algoritma apa enkripsinya
			 	// contoh algoritma dari fungsi hash() antara lain :
			 	// sha1, sha224, sha256, sha512, ripemd128, ripemnd160, whirlpool, tiger128,3 , tiger160,3
			 	// parameter kedua string yang mana yang mau dienkripsi
			 	setcookie('key', hash('sha256', $row['username']), time()+60);
			 } 
			header("Location:index.php");
			exit;
		}
	}
	$error = true;

}



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Halaman Login</title>
</head>
<body>

<h1>Halaman Login</h1>

<?php if( isset($error) ) : ?>
	<p style="color:red; font-style:italic;">username / password salah</p>
<?php endif;?>

<form action="" method="post">
	<ul>
		<li>
			<label for="username">Username : </label>
			<input type="text" name="username" id="username">
		</li>
		<li>
			<label for="password">Password : </label>
			<input type="password" name="password" id="password">
		</li>
		<li>
			<input type="checkbox" name="remember" id="remember">
			<label for="remember">Remember me  </label>
		</li>
		<li>
		<button type="submit" name="login">Login</button>
		</li>
	</ul>
</form>

</body>
</html>