<?php

namespace App\Controllers;
if(!defined('4444a')){
    header("Location: /");
}
/**
 * Description of home
 * @author Fernando
 */
class Perfil {
    
    private $dados;
    
    public function index() {
        $carregarView = new \Core\ConfigView("Views/perfil/perfil", $this->dados);
        $carregarView->renderizar();
    }
}
