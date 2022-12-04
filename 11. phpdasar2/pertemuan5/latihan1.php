<?php 
// array
// variabel yang dapat memiliki banyak nilai
// nilai di dalam array disebut element
// element pada array boleh memiliki tipe datanya berbeda
// pasangan antara key dan value 
// key-nya adalah index, yang dimulai dari 0

// Dua cara membuat array yaitu cara lama dan cara baru
// cara lama
$hari = array("Senin", "Selasa", "Rabu");

// cara baru
$bulan = ["January", "Februari", "Maret"];
$arr1 = [123, "tulisan", false];

// menampilakn array
// var_dump() / print_r()
var_dump($hari);
echo "<br>";
print_r($bulan);
echo "<br>";

// menampilkan 1 element pada array
echo $arr1[0];
echo "<br>";
echo $bulan[1];
echo "<br>";

// menambahkan elemet baru pada array
var_dump($hari);
$hari[] = "Kamis";
$hari[] = "Jum'at";
echo "<br>";
var_dump($hari);

echo "<br>";
$blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Alfian Yulianto",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus aliquam corporis voluptas, ipsum aspernatur cum corrupti. Assumenda odit tenetur provident vel quasi saepe consequuntur quam. Amet nemo, ducimus mollitia deserunt ad, maiores voluptatibus quia quae voluptate aperiam ut soluta debitis fuga aut, esse est tempora laudantium quam alias? Inventore iusto deserunt, soluta maxime repellat debitis earum ad minus enim consequatur vero modi architecto sunt nisi voluptatum! Dolorum temporibus, laboriosam possimus exercitationem cum voluptatibus eligendi! Fuga eaque nostrum ab delectus magni excepturi vitae voluptate sint quos. Officiis ut voluptas fuga exercitationem rerum voluptatum, beatae odit alias ipsa nihil numquam, fugiat velit!"
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Budi Doremi",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia saepe quam consequatur voluptas vero ea ab ut! Amet dolor illum nemo! Dolorem incidunt, nam veniam sapiente cum quos quaerat aperiam."
        ]
    ];

$result =[];
 foreach( $blog_posts as $post ) {
 	if( $post['slug'] == "judul-post-kedua" ) {
 		$result = $post;
 	}
 }
 var_dump($result);
echo $result["title"];




?>