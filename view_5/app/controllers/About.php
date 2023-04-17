<?php

class About extends Controller{
    # method index dengan parameter default
    public function index($nama = "Luthfi Nur Ramadhan", $pekerjaan = "Mahasiswa"){
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;

        $data['judul'] = "About";
        $this->view("templates/header", $data);
        $this->view("about/index", $data);
        $this->view("templates/footer");
    }
    
    public function page(){
        $data['judul'] = "About - Page";
        $this->view("templates/header", $data);
        $this->view("About/page");
        $this->view("templates/footer");
    }
}

?>