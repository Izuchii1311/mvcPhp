<?php

class Mahasiswa_model{
    // Connect Database user PDO
    private $dbh; // Database handler
    private $stmt; // Statement (query)

    // Membuat construct agar yg pertama kali dipanggil adalah databasenya
    public function __construct(){
        // data source name
        $dsn = 'mysql:host=localhost;dbname=phpmvc';

        // cek menggunakan try catch 
        try{
            $this->dbh = new PDO($dsn, 'root', '');
        } catch (PDOException $e){
            die($e->getMessage());
        }
    }

    public function getAllMahasiswa(){
        // Mendapatkan semua mahasiswa butuh query
        $this->stmt = $this->dbh->prepare("SELECT * FROM mahasiswa");
        // Eksekusi jika menggunakan PDO
        $this->stmt->execute();

        // Ambil Data
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>