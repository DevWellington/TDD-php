<?php

require_once "../vendor/autoload.php";

use \DevWellington\HTML\Components;

$input = new \DevWellington\HTML\Components\Input();
$input->setType('text')
    ->setValue('teste')
    ->setAttribute('name', 'input-test')
;
$label = new \DevWellington\HTML\Components\Label('input-test');

$fieldset = new \DevWellington\HTML\Components\FieldSet();
$fieldset
    ->add($label)
    ->add($input)
;

$select = new \DevWellington\HTML\Components\Select();
$select->setAttribute('name', 'select-name');

$option = new \DevWellington\HTML\Components\Option(0, 'Opcao 0');

$select->add($option);



$form = new \DevWellington\HTML\Components\Form();
$form
    ->setName('form-dinamico')
    ->setAction('')
    ->setMethod('POST')
    ->add($fieldset)
    ->add($select)
;

// renderizado separadamente
var_dump($form->getComponents()[0]->getComponents()[0]->render());


?>
<!DOCTYPE html>
    <head>
        <title>Design Patterns com PHP</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet">

        <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <h1>Cadastro de Produtos</h1>
            <?=$form->render()?>
        </div>
    </body>
</html>


