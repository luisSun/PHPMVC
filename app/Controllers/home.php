<?php

namespace App\Controllers;
if(!defined('4444a')){
    header("Location: /");
}
/**
 * Description of home
 * @author Fernando
 */
class home {
    
    private $dados;
    
    public function index() {
        $carregarView = new \Core\ConfigView("Views/dashboard/home", $this->dados);
        $carregarView->renderizar();
    }
}
