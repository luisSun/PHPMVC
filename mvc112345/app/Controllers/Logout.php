<?php

namespace App\Controllers;
if(!defined('4444a')){
    header("Location: /");
}

/**
 * Description of logout
 * Encerra a seção do Usuario
 * @author Fernando
 */
class Logout {
    
    public function index(){
        unset($_SESSION['usuario_id'], $_SESSION['usuario_user'], $_SESSION['usuario_email']);
        $urlDestino = URL . "login/index";
        header("Location: $urlDestino");
    }
}
