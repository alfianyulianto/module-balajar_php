// tombol tambah data
$('.tombolTambahData').on('click', function(){
    $('#judulModal').html('Tambah Data Mahasiswa');
    $('.modal-footer button[type=submit]').html('Tambah Mahasiswa');

    // digunakan agar ketika kita melakukan tambah data maka formnya di kosong
    $('#nama').val('');
    $('#nim').val('');
    $('#email').val('');
    $('#jurusan').val('');
    $('#id').val('');
});

// tombol ubah data
$(function(){
    $('.tampilModalUbah').on('click', function(){
        $('#judulModal').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Mahasiswa');
        $('.modal-body form').attr('action', 'http://localhost:8080/phpmvc/public/mahasiswa/ubah')

        // mengambil data-id saat tombol ubah di klik
        const id = $(this).data('id');
        
        // ajax digunakan untuk mereload sebagian halaman
        $.ajax({
            // url digunakan untuk mengambil data dari url tujuan
            url: "http://localhost:8080/phpmvc/public/mahasiswa/getubah",
            // data: {id :id} digunakan untuk mengirimkan data
            // id sebelah kiri : nama datanya
            // id sebelah kanan : data yg dikirimkan
            data: {id : id},
            // method: artinya datanya dikirim lewat apa (get/post)
            method: 'post',
            // dataType : digunakan untuk mengembalikan tipe datanya(json/string/dll)
            dataType: 'json',
            // jika success apa yg ingin dilakukan
            // function aka menerima prameter ketiak permintaan ajax yg ada di di url berhasil maka akan ditangkap oleh parameter
            success: function(data){
                $('#nama').val(data.nama);
                $('#nim').val(data.nim);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }
        });
    });
});