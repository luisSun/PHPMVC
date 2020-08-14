<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

/**
 * Description of logout
 *
 * @author Fernando
 */
class Logout {
    
    public function index(){
        unset($_SESSION['usuario_id'], $_SESSION['usuario_user'], $_SESSION['usuario_email']);
        $urlDestino = URL . "login/index";
        header("Location: $urlDestino");
    }
}
