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


$requestUrl = filter_var($requestUrl, FILTER_SANITIZE_URL);

?>
<!DOCTYPE html>
    <head>
        <title>TDD com PHP</title>
        <link href="<?=$requestUrl?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?=$requestUrl?>css/bootstrap-theme.min.css" rel="stylesheet">

        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script type="text/javascript" src="<?=$requestUrl?>js/bootstrap.min.js"></script>
        <style type="text/css">
            fieldset {border: 0px;}
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Cadastro de Produtos</h1>

            <?php if( ! $test2->validator->isValid() ): ?>
                <div class="alert alert-danger" role="alert">
                    <ul>
                        <?php foreach($test2->validator->getInvalidFields() as $alert): ?>
                            <?="<li>".$alert."</li>"?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?=$form->render()?>
        </div>
    </body>
</html>


