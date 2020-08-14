<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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
