<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query){
	global $conn;
	$result =mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}
function tambah($data){
	global $conn;
	// ambil data dari tiap element dalam form
	$nim = htmlspecialchars($data['nim']);
	$nama = htmlspecialchars($data['nama']);
	$email = htmlspecialchars($data['email']);
	$jurusan = htmlspecialchars($data['jurusan']);
	
	// upload gambar
	$gambar = upload();
	if ( !$gambar ) {
		return false;
	}

	// query insert data
	$query = "INSERT INTO mahasiswa VALUES('', '$nama', '$nim', '$email', '$jurusan', '$gambar')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}
function upload(){
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if ( $error === 4 ) {
		echo "<script>
			alert('pilih gambar terlebih dahulu!');
		</script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	// explode() : sebuah fungsi untuk memecah string menjadi array
	// explode(delimiter, string)
	$ekstensiGambar = explode('.', $namaFile);
	// end : digunakan untuk mengambil element array yang paling terakhir
	// end(array)
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	// in_array : digunakan untuk mengecek apakah ada sebuah string di dalam array
	// in_array(needle, haystack)
	// fungsi ini menghasilkan true jika ada
	// dan jika menghasilkan false jika tidak ada
	if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
			alert('yang anda upload bukan gambar!');
		</script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if ( $ukuranFile > 1000000 ) {
		echo "<script>
			alert(ukuran gambar terlalu besar!');
		</script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	// move_uploaded_file : digunakan untuk memindahka file dari tempat tmp_name ke folder tujuannya
	// move_uploaded_file(filename, destination)
	move_uploaded_file($tmpName, "img/" . $namaFileBaru);

	return $namaFileBaru;

}
function ubah($data){
	global $conn;
	$id = $data["id"];
	$nim = htmlspecialchars($data["nim"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$gambarLama = $data["gambarLama"];

	// cek apakah user pilih gambar baru atau tidak
	if ( $_FILES["gambar"]["error"] === 4 ) {
		$gambar = $gambarLama;
	}else{
		$gambar = upload();
	}

	// query update data
	$query = "UPDATE mahasiswa SET
				nama = '$nama',
				nim = '$nim',
				email = '$email',
				jurusan = '$jurusan',
				gambar = '$gambar' 
				WHERE id = $id";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}
function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
	return mysqli_affected_rows($conn);
}
function cari($keyword){
	$query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR
		nim LIKE '%$keyword%' OR
		email LIKE '%$keyword%' OR
		jurusan LIKE '%$keyword%'
	";
	return query($query);
}
function registrasi($data){
	global $conn;
	// stripcslashes() : digunakan untuk menghilangkan karakter tertentu. Misalnya karakter / atau *
	// stripcslashes(str)
	// mysqli_real_escape_string() : emmungkinkan seorang user memasukan tanda kutip sehingga tanda tersbut akan masuk ke database
	$username = htmlspecialchars(strtolower(stripcslashes($data["username"])));
	$password = htmlspecialchars(mysqli_real_escape_string($conn, $data["password"]));
	$password2 = htmlspecialchars(mysqli_real_escape_string($conn, $data["password2"]));

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
	if ( mysqli_fetch_assoc($result) ) {
		echo "<script>
			alert('username sudah terdaftar!');
		</script>";
		return false;
	}

	// cek konfirmasi password
	if ( $password !== $password2 ) {
		echo"<script>
			alert('konfirmasi password tidak sesuai!');
		</script>";
		return false;
	}

	// enksripsi password
	// password_hash() : digunakan untuk mengacak sebuah string menggunakan algortima enkripsi tertentu
	// terdapat 2 algoritma yaitu_PASSWORD_DEFAULT dan CRYPT_BLOWFISH
	// password_hash terdapat 2 parameter yaitu:
	// Parameter yang pertama password apa yang akan diacak
	// Parameter yang kedua mengacaknya pakek algoritma apa
	// password_hash(string, PASSWORD_DEFAULT)
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");
	return mysqli_affected_rows($conn);


}

?>