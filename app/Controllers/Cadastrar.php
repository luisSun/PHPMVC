<?php

namespace App\Controllers;

if(!defined('4444a')){
    header("Location: /");
}

class Cadastrar {
    
    private $dados;
    
    public function index() {
        $carregarView = new \Core\ConfigView("Views/usuario/cadastrar", $this->dados);
        $carregarView->renderizar();
    }
}

