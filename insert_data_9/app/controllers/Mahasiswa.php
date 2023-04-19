<?php

class Mahasiswa extends Controller{
    public function index(){
        $data ['judul'] = "Data Mahasiswa";
        $data ['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');

    }

    public function detail($id){
        $data ['judul'] = "Detail Mahasiswa";
        $data ['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');

    }

    public function tambah(){
        // menjalankan model tambahDataMahasiswa dari model Mahasiswa_model.
        // yang mengirimkan data $_POST itu menghasilkan nilai > 0 (true = ada data baru yang berhasil ditambahkan)
        if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0){
            // jika ada data yg dikirimkan maka pindahkan ke halaman /mahasiswa/index
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }
}