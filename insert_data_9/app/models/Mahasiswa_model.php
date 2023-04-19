<?php

class Mahasiswa_model{
    private $table = 'mahasiswa';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllMahasiswa(){
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id){
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id =:id");
        $this->db->bind('id', $id);
        return $this->db->single(); 
    }

    // Membuat method tambahDataMahasiswa
    public function tambahDataMahasiswa($data){
        // Melakukan Query Insert ke tabel mahasiswa dengan melakukan binding
        $query = "INSERT INTO mahasiswa VALUE ('', :nama, :npm, :kelas, :jurusan)";

        // Jalankan Query
        $this->db->query($query);

        // Binding data
        // $data menangkap data yang dikirim melalui $_POST, dan nama diambil dari name yg ada di dalam form.
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('npm', $data['npm']);
        $this->db->bind('kelas', $data['kelas']);
        $this->db->bind('jurusan', $data['jurusan']);

        // Setelah di bind lakukan eksekusi
        $this->db->execute();

        // Mengembalikan nilai angka
        return $this->db->rowCount();
    }
}

?>