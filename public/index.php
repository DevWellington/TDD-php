<?php

require_once "../src/bootstrap.php";

use \DevWellington\HTML\Components;
use \Application\Controller;

$requestUrl = 'http://'.$_SERVER['HTTP_HOST'].'/';
$route = new \DevWellington\Router\Router($requestUrl);

$crtlName = $route->getControllerName();
$actionName = $route->getActionName();

$test2 = new $crtlName($di->get('db'));
$form = $test2->$actionName();

?>
<!DOCTYPE html>
    <head>
        <title>TDD com PHP</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet">

        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <style type="text/css">
            fieldset {border: 0px;}
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Cadastro de Produtos</h1>
            <?=$form->render()?>
        </div>
    </body>
</html>


