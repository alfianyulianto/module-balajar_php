$('.input-keyword').on('keydown', function(){
	$.ajax({
	url: "ajax/mahasiswa.php?keyword=" + $(this).val(),
	success: results => $('.container').html(results),
	});
});

