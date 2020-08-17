<?php

namespace Core;
if(!defined('4444a')){
    header("Location: /");
}
/**
 * Description of Permission
 *
 * @author Fernando
 */
class Permission {
    
    private $urlController;
    private $paginaPublica = array();
    private $paginaRestrita = array();
    private $resultado;
    
    function getResultado() {
        return $this->resultado;
    }
    
    public function index($urlController): void {
        $this->urlController = $urlController;
        //echo "Permissão". $this->urlController;
        
        $this->paginaPublica = ["login", "sair"];
        if(in_array($this->urlController, $this->paginaPublica)){
            $this->resultado = $urlController;
        }
        else{
            $this->pagRestrita();
        }

    }
    
    private function pagRestrita():void {
        $this->paginaRestrita = ["home", "perfil", "cadastrar"];
        
        if(in_array($this->urlController, $this->paginaRestrita)){
            $this->verificaLogin();
        }
        else{
            $urlDestino = URL . "login/index";
            header("Location: $urlDestino");
        }
        
    }
    
    private function verificaLogin(): void{
        if(isset($_SESSION['usuario_id']) AND isset($_SESSION['usuario_user']) AND isset($_SESSION['usuario_email'])){
            $this->resultado = $this->urlController;
        }
        
        else{
            $_SESSION['msg'] = "<p style='color: #red;'>Realize o login para Acessar a pagina</p>";
            $urlDestino = URL . "login/index";
            header("Location: $urlDestino");
        }
    }
   
    
}
