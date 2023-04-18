<?php

# Class default
class Home extends Controller{
    # Method default
    public function index(){
        $data['judul'] = "Home";
        // Menambahkan data baru yang akan ditampilkan di index
        // Akan memanggil model user dan panggil method di dalamnya 
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}

?>