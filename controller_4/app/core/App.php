<?php

class App {
    # property untuk menentukan controller dan method defaultnya
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct(){
        $url = $this->parseURL();
        
        // Memperbaiki [0] = Home
        if($url == NULL){
            $url =[$this->controller];
        }

        # Controller
        // ada tidak file class controller default dengan nama .. misalkan Home
        // http://localhost/BelajarPHP/mvcPhp/controller_4/public/home/index/satu/dua/
        if (file_exists('../app/controllers/' . $url[0] . ".php")){
            // Menimpa controller sebelumnya dengan controller yang baru
            $this->controller = $url[0];
            // hilangkan controllernya dari element arraynya
            unset($url[0]);
        }

        // panggil controller dan menggabungkan dengan controller baru
        require_once '../app/controllers/' . $this->controller . '.php';
        // melakukan instansiasi class supaya dapat memanggil methodnya
        $this->controller = new $this->controller;


        // jika url kosong maka akan menjadi method default, jika url ada maka lakukan pengecekan
        # Method
        if (isset($url[1])){
            // cek di dalam sebuah object, ada tidak methodnya
            if (method_exists($this->controller, $url[1])){
                // jika ada maka timpa
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // Kelola Parameter
        if (!empty($url)){
            // ambil data di url
            $this->params = array_values($url);
        }

        // Jalankan controller dan method serta kirimkan params jika ada
        // untuk menjalankan controller dan method serta jalankan parameter
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    # get and parsing url
    public function parseURL(){
        if (isset ($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}

?>