<?php
namespace App\Controllers;
/**
 * Description of login
 *
 * @author Fernando
 */
class Login {
    
    private $dados;
    
    public function index() {
        
        $this->dados= filter_input_array(INPUT_POST, FILTER_DEFAULT);
        
        if(!empty($this->dados['validarLogin'])){
            $vLogin = new \App\Models\AdmsLogin();
            $vLogin->login($this->dados);
            if($vLogin->getResultado()){   
                $urlDestino = URL . "home/index";
                header("Location: $urlDestino");
                //colocar o redirecionamento para a pagina de secretaria adm etc.
            }
            else{
                $this->dados['form'] = $this->dados;
            }
            }
         
        $carregarView = new \Core\ConfigView("Views\login\login", $this->dados);
        $carregarView->renderizar();
    }
    
}
