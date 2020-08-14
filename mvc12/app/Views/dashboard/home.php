<?php

if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

?>

<h1>PAGINA INICIAL</h1>
<h3><<?php echo "a href=". URL . "Logout/index";?>">Clique aqui para sair</a></h3>
