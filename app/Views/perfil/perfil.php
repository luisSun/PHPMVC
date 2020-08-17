<?php
/**
 * Description Views/Home
 * View da pagina principal
 * @author Fernando
 */

if(!defined('4444a')){
    header("Location: /");
}

echo "<p>Perfil do usuario</p>";
echo "<p>ID: " . $_SESSION['usuario_id'];
echo "<p>Nome: " . $_SESSION['usuario_user'];
echo "<p>Email: " . $_SESSION['usuario_email'];
?>

<h3><<?php echo "a href=". URL . "Home/index";?>">Clique aqui para Voltar para tela Inicial</a></h3>
<h3><<?php echo "a href=". URL . "Logout/index";?>">Clique aqui para sair</a></h3>


