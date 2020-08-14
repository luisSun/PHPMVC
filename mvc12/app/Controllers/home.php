<?php

namespace App\Controllers;

/**
 * Description of home
 *
 * @author Fernando
 */
class home {
    
    private $dados;
    
    public function index() {
        $carregarView = new \Core\ConfigView("Views/dashboard/home", $this->dados);
        $carregarView->renderizar();
    }
}
