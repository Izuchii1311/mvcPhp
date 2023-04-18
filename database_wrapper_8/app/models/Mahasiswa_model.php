<?php

class Mahasiswa_model{
    private $table = 'mahasiswa';
    // menyimpan variabel untuk class databasenya 
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllMahasiswa(){
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id){
        // idnya tidak langsung dipanggil agar menghindari sql injection
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id =:id");
        $this->db->bind('id', $id);
        return $this->db->single(); 
    }
}

?>