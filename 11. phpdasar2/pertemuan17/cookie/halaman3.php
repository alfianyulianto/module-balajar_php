<?php 
// untuk menghilangkan COOKIE mengguanakan
// menggunakan fungsi setcokie() 
// fungsi ini disis dengan key yang sama dengan COOKIE yang di set dan kemudian valuenya dikosongkan
// untuk parameter ke 3 di isi dengan time()-3600
setcookie('nama', '', time()-3600);



?>