<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

if(!defined('4444a')){
    header("Location: /");
}

/**
 * Description of Ativar
 * Ativação de conta com a HASH recebido no e-mail
 * @author Fernando
 */
class Ativar {
    
    private $chave;
    public $ativarUsuario;
    
    public function index() {
        
        $this->chave = filter_input(INPUT_GET, "chave", FILTER_DEFAULT);
        
        if(!empty($this->chave)){
            $ativarUsuario = new \App\Models\AdmsAtivar();
            $ativarUsuario->validarChave($this->chave);
            $urlDestino = URL . "login/index";
            echo '<br><br>Ativar Controller<br>';
            var_dump($this->ativarUsuario);
            //header("Location: $urlDestino");
        }else{
            $urlDestino = URL . "login/index";
            //header("Location: $urlDestino");
        }
        
    }
}
