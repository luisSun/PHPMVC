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

/* Resgatar Dados preenchidos no formulario
 * caso alguma informação eteja incorreta
 * e o envio não ocorra
 */
if(isset($this->dados['form'])){
    $valorForm = $this->dados['form'];
}

?>

<h1>Area Restrita</h1>

<form method="POST" action="#">
    <label>Nome do Usuario</label><br>
    <input type="email" name="usuario" placeholder="Digie o nome de usuario" value="<?php if(isset($valorForm['usuario'])){echo $valorForm['usuario'];}?>"><br><br>
    
    <labe>Senha</labe><br>
    <input name="senha" type="password" placeholder="Digite a senha"><br>
    
    <input name="validarLogin" type="submit" value="Enviar"><br>
    
    <p>Cadastrar - Esqueci a senha!</p>
</form>

<?php