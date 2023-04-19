<?php

// Class untuk menangani Flash Message
class Flasher{
    // Method Static agar dapat memanggil tanpa di instansiasi.

    public static function setFlash($pesan, $aksi, $tipe){
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    // method untuk melakukkan flash [pesan]
    public static function flash(){
        // cek di sebuah halaman, ada session flashnya atau tidak.
        if( isset($_SESSION['flash'])){
            // jika ada
            echo '
            <div class="alert alert-' . $_SESSION['flash']['tipe'] . '  alert-dismissible fade show" role="alert">
                Data Mahasiswa <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';

            // Agar session berlaku 1x
            unset($_SESSION['flash']);


            // agar flashernya jalan panggil di initnya
            // jangan lupa agar sessionnya jalan harus melakukan session start agar lebih mudah dipanggil maka lakukan di public index.php
        }
    }
}

?>