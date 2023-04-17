<?php

#
class About{
    public function index($nama = "Luthfi Nur Ramadhan", $pekerjaan = "Mahasiswa"){
        // menampilkan nama dan pekerjaannya berdasarkan parameter yang ada di urlnya 
        echo "Halo, Nama saya $nama saya adalah seorang $pekerjaan.";
    }

    public function page(){
        echo "About/page";
    }
}

?>