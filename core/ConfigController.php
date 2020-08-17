<?php

namespace Core;
if(!defined('4444a')){
    header("Location: /");
}
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConfigController
 *
 * @author Fernando
 */
class ConfigController {
    
    private $urlTentativa;
    private $urlConjunto;
    private $urlController;
    private $urlMetodo;
    
    public function __construct() {
        
        if(!empty(filter_input(INPUT_GET, "url", FILTER_DEFAULT))){
            $this->urlTentativa = filter_input(INPUT_GET, "url", FILTER_DEFAULT);
            $this->urlConjunto = explode("/", $this->urlTentativa);
            
            if((isset($this->urlConjunto[0]) AND ($this->urlConjunto[1]))){
                $this->urlController = $this->urlConjunto[0];
                $this->urlMetodo = $this->urlConjunto[1];
            }
            
            else{
                $this->urlController = "erro";
                $this->urlMetodo = "index";
            }      
        }
        
        else{
            $this->urlController = "login";
            $this->urlMetodo = "index";
        }    
        
        //echo "Controller: {$this->urlController}<br> Metodo: {$this->urlMetodo}<br>";
        
    }
    
    public function carregar() {
        $this->config();
        $valPermition = new \Core\Permission();
        $valPermition->index($this->urlController);
        //Converter para A primeira letra maiuscula;
        $urlUpperController = ucwords($this->urlController);
        $classe = "\\App\\Controllers\\" . $urlUpperController;
        $ClasseCarregar = new $classe;
        $ClasseCarregar->index();
        
    }
    
    private function config() {
        define('URL', 'http://localhost/mvc12/');
        
    }
}


