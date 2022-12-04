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
	$query = "INSERT INTO mahasiswa VALUES(''  '$nama', '$nim', '$email', '$jurusan', '$gambar')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}
function upload(){
	// var_dump($_FILES['gambar']); die();
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	// gambar diupload : jika nilai error === 0 
	// gambar tidak diupload : jika nilai error === 4
	$tmpName = $_FILES['gambar']['tmp_name'];
	// var_dump($error); die();
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

?>