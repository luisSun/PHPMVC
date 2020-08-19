<?php

namespace App\Controllers;

if(!defined('4444a')){
    header("Location: /");
}

class Cadastrar {
    
    private $dados = array();
    
    public function index() {
        
        $this->dados= filter_input_array(INPUT_POST, FILTER_DEFAULT);
        var_dump($this->dados);
        
        if(!empty($this->dados['CadUser']) AND !empty($this->dados['senha'])){
            $cadUsuario = new \App\Models\AdmsCadastrar();
            if($cadUsuario->cadastrar($this->dados)){
            }else{
                $this->dados['form'] = null;
            }
        }
        
        $carregarView = new \Core\ConfigView("Views/usuario/cadastrar", $this->dados);
        $carregarView->renderizar();
    }
}

