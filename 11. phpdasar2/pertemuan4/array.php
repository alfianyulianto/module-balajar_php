<?php 
// array() : membuat array kosong
$arr = array("Senin", "Selasa", "Rabu");
var_dump($arr);

// array_diff() : membandingkan 2 array berdasarkan values
// output array
// array_diff(array1, array2)
$arr1 = array("Senin", "Selasa", "Rabu", "Jum'at");
$arr2 = array("Senin", "Selasa");
var_dump(array_diff($arr1, $arr2));

// array_diff-assoc() : membandingkan 2 array berdasarkan key-value
// output array
// array_diff_assoc(array1, array2)
$arr1 = array("nim"=>"L200180121", "nama"=>"Alfian Yulianto", "jurusan"=>"Informatika");
$arr2 = array("nim"=>"L200180121", "nama"=>"Alfian Yulianto");
var_dump(array_diff_assoc($arr1, $arr2));

// array_diff_key() : membandingkan 2 array berdasarkan key
// output array
// array_diff_key(array1, array2)

// array_flip() : membalik posisi key menjadi value
// output array
// array_flip(trans)

// array_key_exists() : mencari ada tidaknya key di dalam array
// output boolean
// array_key_exists(key, array)

// array_merge() : menggabungkan 2 array
// output array
// array_merge(array1, array2)

// array_push() : menambah element var ke urutan belakang array 
// output array
// array_push(array, var)

// array_pop() : menghapus element dari urutan belakang pada array
// output array
// array_pop(array)

// array_search() : emncari key berdasarkan input value
// output key
// array_search(needle, haystack)

// array_unique() : menghapus semua value yang kembar 
// output array
// array_unique(array)

// count() : mendapatkan banyaknya element pada array
// output integer
// count(var)

// in_array : digunakan untuk mengecek apakah ada value di dalam array
// in_array(needle, haystack)
$arr1 = ["jpg", "jpeg", "png"];
$arr2 = ["jpeg"];
var_dump(in_array($arr2, $arr1));

// sort() : digunakan untuk mengurutkan element array dari kecil ke besar (ascending)
// sort(array)
$arr = [9, 8, 17, 0, 4, 28, 1, 5];
var_dump($arr);
sort($arr);
var_dump($arr);

// rsort() : digunakan untuk mengurutkan element array dari besar ke kecil (descending)
// rsort(array)
$arr = [9, 8, 17, 0, 4, 28, 1, 5];
var_dump($arr);
rsort($arr);
var_dump($arr);

// asort() : digunakan untuk mengurutkan ascending element array associative berdasarkan value
// jika valuenya angka maka akan diurutkan berdasarkan angka paling kecil 
// jika valuenya huruf maka akan diurutkan berdasarkan abjad
// asort(array)
$arr = ["nama"=>"alfian", "umur"=>"21","jenis_kelamin"=>"laki-laki","tinggi_badan"=>"170"];
var_dump($arr);
asort($arr);
var_dump($arr);

// ksort() : digunakan untuk mengurutkan ascending element array associative berdasarkan key
// ksort(array)
$arr = ["nama"=>"alfian", "umur"=>"21","jenis_kelamin"=>"laki-laki","tinggi_badan"=>"170"];
var_dump($arr);
ksort($arr);
var_dump($arr);

// arsort() : digunakan untuk mengurutkan descending element array associative berdasarkan value
// jika valuenya angka maka akan diurutkan berdasarkan angka paling besar
// jika valuenya huruf maka akan diurutkan berdasarkan abjad terakhir
// arsort(array)
$arr = ["nama"=>"alfian", "umur"=>"21","jenis_kelamin"=>"laki-laki","tinggi_badan"=>"170"];
var_dump($arr);
arsort($arr);
var_dump($arr);

// krsort() : digunakan untuk mengurutkan descending element array associative berdasarkan key
// krsort(array)
$arr = ["nama"=>"alfian", "umur"=>"21","jenis_kelamin"=>"laki-laki","tinggi_badan"=>"170"];
var_dump($arr);
krsort($arr);
var_dump($arr);





?>