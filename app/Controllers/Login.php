<?php
namespace App\Controllers;

if(!defined('4444a')){
    header("Location: /");
}
/**
 * Description of login
 * Verificação e conexão com a classe AdmsLogin *
 * @author Fernando
 */
class Login {
    
    private $dados;
    
    public function index() {
        
        $this->dados= filter_input_array(INPUT_POST, FILTER_DEFAULT);
        
        if(!empty($this->dados['validarLogin']) AND !empty($this->dados['senha'])){
            $vLogin = new \App\Models\AdmsLogin();
            $vLogin->login($this->dados);
            if($vLogin->getResultado()){   
                $urlDestino = URL . "home/index";
                header("Location: $urlDestino");
            }
            else{
                $this->dados['form'] = $this->dados;
            }
            }
        else{
        }
         
        $carregarView = new \Core\ConfigView("Views\login\login", $this->dados);
        $carregarView->renderizar();
    }
    
}
