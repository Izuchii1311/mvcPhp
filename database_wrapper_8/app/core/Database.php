<?php

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PASSWORD;
    private $name = DB_NAME;

    // Database Handler 
    private $dbh;
    // Statement (Query)
    private $stmt;

    // Membuat construct agar yg pertama kali dipanggil adalah databasenya
    public function __construct(){
        // Data Source Name
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->name;
        
        // membuat $option
        $option = [
            // untuk membuat koneksinya terjaga terus
            PDO::ATTR_PERSISTENT =>true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];


        try{
            // Membuat parameter baru $option
            $this->dbh = new PDO($dsn, $this->user, $this->password, $option);
        } catch (PDOException $e){
            die($e->getMessage());
        }
    }

    // function untuk menjalakan query
    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }

    // binding data
    public function bind($param, $value, $type = null){
        // lakukan pengecekan
        if ( is_null($type)){
            // switch true supaya langsung jalan
            switch (true){
                // kalo typenya integer maka otomatis di set integer
                case is_int($value) : 
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    // akan terhindar dari sql injection karena query dieksekusi setelah string dibersihkan 


    // Eksekusi
    public function execute(){
        $this->stmt->execute();
    }

    // Tentukan datanya mw banyak atau tidaknya
    // jika banyak
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // jika satu
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>