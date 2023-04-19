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

    public function tambahDataMahasiswa($data){
        $query = "INSERT INTO mahasiswa VALUE ('', :nama, :npm, :kelas, :jurusan)";

        $this->db->query($query);

        $this->db->bind('nama', $data['nama']);
        $this->db->bind('npm', $data['npm']);
        $this->db->bind('kelas', $data['kelas']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id){
        $query = "DELETE FROM mahasiswa WHERE id =:id";

        $this->db->query($query);
        // Lakukan binding
        $this->db->bind('id', $id);

        // eksekusi
        $this->db->execute();

        // mengembalikan nilai 1 
        return $this->db->rowCount();
    }
}

?>