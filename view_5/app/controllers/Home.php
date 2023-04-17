<?php

# Class default
class Home extends Controller{
    # Method default
    public function index(){
        // $this->view('alamat menuju view yg ingin diakses');
        $data['judul'] = "Home";
        $this->view('templates/header', $data);
        $this->view('home/index');
        $this->view('templates/footer');
    }
}

?>