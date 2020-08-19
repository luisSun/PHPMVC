<?php
/**
 * Description Views/Home
 * View da pagina principal
 * @author Fernando
 */

if(!defined('4444a')){
    header("Location: /");
}

if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

?>

<h1>PAGINA INICIAL</h1>
<h3><<?php echo "a href=". URL . "perfil/index";?>">Clique aqui para Entrar no Perfil</a></h3>
<h3><<?php echo "a href=". URL . "cadastrar/index";?>">Clique aqui para CADASTRAR</a></h3>
<h3><<?php echo "a href=". URL . "Logout/index";?>">Clique aqui para sair</a></h3>
