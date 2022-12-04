// $ : digunakan untuk memanggil jQuery

// $(document).ready(function(){}) : jika dokumen sudah siap di simpan ke memory maka ini akan dijalankan
$(document).ready(function(){ 
	// hilangkan tombol cari
	$('#tombol-cari').hide();

	// event ketika keyword ditulis
	$('#keyword').on('keyup', function(){
		// memunculkan icon loading
		$('.loading').show()

		// ajax menggunakan load
		// load : digunakan untuk mengambil data dari sumber menggunakan get
		// $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

		// $.get() : sama dengan lod akan tetapi bisa melakukan sesuatu
		$.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data){
			$('#container').html(data);
			$('.loading').hide();
		});
	});
});
