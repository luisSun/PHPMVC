<?php
/**
 * Description Views/Home
 * View da pagina principal
 * @author Fernando
 */


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

<h1>Teste cadastrar</h1>

<form method="POST" action="#">
    <label>Nome</label>
    <input type="text" name="nome" placeholder="Digie o nome de usuario" value="<?php if(isset($valorForm['name'])){echo $valorForm['usuario'];}?>" required><br><br>
    
    <label>E-Mail</label>
    <input type="email" name="email" placeholder="Digie o email de usuario" value="<?php if(isset($valorForm['email'])){echo $valorForm['usuario'];}?>" required><br><br>
  
    
    <labe>Senha</labe>
    <input name="senha" type="password" placeholder="Digite a senha" required><br><br>
    
    <input name="CadUser" type="submit" value="Cadastrar"><br>
    
</form>