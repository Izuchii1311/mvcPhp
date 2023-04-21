// Jalankan function berikut ketika halaman telah siap
$(document).ready(function() {
    
    // Ketika tombolTambahData di klik maka jalankan fungsi berikut :
    $('.tombolTambahData').on('click', function(){
        $('#judulModal').html('Apakah anda ingin menambahkan data baru?');
        $('.modal-footer button[type=submit]').html('Simpan Data');

    })


    // Ketika button untuk tampilModalEdit di klik maka jalankan fungsi berikut :
    $('.tampilModalEdit').on('click', function(){

        // Merubah label html menggunakan jQuery.
        $('#judulModal').html('Apakah anda ingin mengedit data?');
        $('.modal-footer button[type=submit]').html('Edit Data');
        $('.modal-body form').attr('action', 'http://localhost/BelajarPHP/mvcPhp/update_data_12/public/mahasiswa/edit/')

        // $(this) adalah tombol yang kita klik, ambil datanya yg namanya id
        const id = $(this).data('id');

        $.ajax({
            // url : Akan mengambil data ke url mana?
            // data : Data akan berupa object {id (nama data yang dikirimkan), id (isi datanya)}
            // method : Data akan dikirimkan lewat method apa ?
            // dataType : Akan mengembalikan data berupa Json.
            // success : Ketika sukses maka jalankan fungsi berikut yang akan menerima data.
            url: 'http://localhost/BelajarPHP/mvcPhp/update_data_12/public/mahasiswa/getEdit/',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#nama').val(data.nama);
                $('#npm').val(data.npm);
                $('#kelas').val(data.kelas);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }
        });

    });
});