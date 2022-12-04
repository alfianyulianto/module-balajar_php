<?php 
require "functions.php";
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
		<button type="submit" name="login">Login</button>
		</li>
	</ul>
</form>

</body>
</html>