<?php
# File utama yang akan diakses
# Memanggil Aplikasi MVC

# Jalankan Session
// kalo di dalam aplikasi tidak ada session maka jalankan sessionnya
if (!session_id()) {
    session_start();
}

require_once "../app/init.php";

# Instansiasi class App
$app = new App();

?>
