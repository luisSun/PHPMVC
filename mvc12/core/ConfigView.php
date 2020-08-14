<?php

namespace Core;

/**
 * Description of ConfigView
 *
 * @author Fernando
 */
class ConfigView {
    
    private $nome;
    private $dados;
    
    public function __construct($nome, array $dados = null) {
        $this->nome = $nome;
        $this->dados = $dados;
        
    }
    
    public function renderizar() {
        if(file_exists('app/' . $this->nome . '.php')){
            include 'app/' . $this->nome . '.php';
        }
        else{
            echo 'Erro ao carregar a pagina<br>';
            //echo "Erro ao carregar a VIEW: {$this->nome} <br>";
        }
        
    }
}
