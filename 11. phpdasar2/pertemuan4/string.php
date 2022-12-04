<?php 
// echo() : untuk menampilkan output
echo "<h2>Belajar PHP</h2>";

// strlen() : menghitung panjang / lenght dari sebuah string
echo strlen("Alfian Yulianto");
$strlen = "Alfian Yulianto";
echo strlen($strlen);


// strcmp() : untuk membandingkan 2 buah string
// fungsi strcmp() adalah binary-safe dan case-sensitif
// nilai 0 jika kedua string sama
// nilai < 0 jika string 1 lebih kecil dari string 2
// nilai > 0 jika string 1 lebih besar dari string 2
// strcmp(str1, str2)
echo strcmp("Hello", "Hello");
echo strcmp("Hs", "Hsaaa");
echo strcmp("Hs", "H");

// explode() : untuk memecak string menjadi array
// explode(delimiter, string);
$string = "Lagi belajar PHP";
$explode = explode(" ", $string);
foreach( $explode as $exp ) {
	echo $exp . "<br>";
}

// htmlspecialcharts() : untuk menjaga website dari hacker


// htmlentities : merubah teks HTML menjadi teks biasa
$string2 = "<a href='https://www.google.com'>";
echo htmlentities($string2);

// implode() : menggabungkan elemen-elemen array menjadi sebuah string
// implode(glue, pieces)
$array = ["Lagi", "belajar", "PHP"];
echo implode(" ", $array);

// lcfirst() : mengubah karakter awal atau huruf pertama menjadi huruf kecil
echo lcfirst("Alfian Yulianto");

// ucfirst() : mengubah karakter awal atau huruf pertama menjadi huruf besar
echo ucfirst("alfian");

// md5() : mengubah string menjadi hash MD5
echo md5("alfian");

// strstr : mengambil sebagian dari string dari string yang ditentukan
echo strstr("Alfian Yulianto", "a");

// str_replace() : menggantikan nilai dari sebuah string menjadi string yang baru
// str_replace(search, replace, subject)
$str_replace = "Lagi belajar PHP";
echo str_replace("PHP", "HTML", $str_replace);

// strrev() : membalikan urutan karakter pada sebuah string
echo strrev("Alfian Yulianto");

// strtolower() : mengubah ukuran string menjadi ukuran kecil
echo strtolower("ALFIAN YULIANTO");

// strtoupper() : mengubah ukuran string menjadi ukuran besar atau huruf kapital
echo strtoupper("alfian yulianto");

// substr() : memotong string dan kemudian mengambil nilainya dari string tersebut
// substr(string, start)
// substr(string, start, lenght)
echo substr("alfian", 2);
echo substr("alfian", 2, 2);

// str_split() : mengkonversi string menjadi array
$arr = str_split("alfian");
var_dump($arr);

echo ord(1);


?>