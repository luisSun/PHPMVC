<?php
session_start();
ob_start();
define('4444a', true);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Site Empresa</title>
    </head>
    <body>
            <?php
            require './vendor/autoload.php';
            use Core\ConfigController as Home;
            $url = new Home();
            $url->carregar();
            ?>
    </body>
</html>
