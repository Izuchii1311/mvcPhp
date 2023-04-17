<?php

# Class utama
class Controller {
    // Mamberikan parameter default
    public function view($view, $data = []){
        require_once '../app/views/' . $view . '.php';
    }
}

?>