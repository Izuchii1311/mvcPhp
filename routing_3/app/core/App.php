<?php

class App {
    public function __construct(){
        $url = $this->parseURL();
        var_dump($url);
    }

    # get and parsing url
    public function parseURL(){
        if (isset ($_GET['url'])){
            // rtream unutk Menghapus / terakhir pada url
            $url = rtrim($_GET['url'], '/');
            // bersihkan url dari karakter karakter aneh
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // pecah url berdasarkan tanda /
            $url = explode('/', $url);
            return $url;
        }
    }
}

?>