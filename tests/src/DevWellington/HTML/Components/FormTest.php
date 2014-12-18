<?php

namespace DevWellington\HTML\Components;

class FormTest extends \PHPUnit_Framework_TestCase
{
    public function testVerificaSeAClasseFormPertenceAInterfaceIComponent()
    {
        $form = new Form();
        $this->assertInstanceOf('\DevWellington\HTML\Components\IForm', $form);
    }

    public function testVerificaSeConsegueCriarAClasseForm()
    {
        $form = new Form();
        $this->assertInstanceOf('\DevWellington\HTML\Components\Form', $form);
    }

    public function testVerificaSeConsegueCriarUmFormularioSemAtributos()
    {
        $form = new Form();
        $this->assertEquals("<form>\n</form>", $form->render());
    }

    public function testVerificaSeConsegueInserirOsAtributos()
    {
        $form = new Form();

        $form->setName('form-name-test');
        $this->assertEquals('form-name-test', $form->getName());

        $form->setMethod('POST');
        $this->assertEquals('POST', $form->getMethod());


        $form->setAction('save.php');
        $this->assertEquals('save.php', $form->getAction());

    }

    public function testVerificaSeConsegueInserirUmAtributoNaAttributesArray()
    {
        $form = new Form();
        $form->setName('form-name-test')
            ->setAttribute('display', 'none')
        ;

        $this->assertEquals(" name='form-name-test' display='none'", $form->getAttributes());

    }

    public function testVerificaSeConsegueCriarTodoOFormularioComOsAtributos()
    {
        $form = new Form();
        $form->setName('form-name-test')
            ->setMethod('POST')
            ->setAction('save.php')
            ->setAttribute('class', 'form-horizontal')
            ->setAttribute('role', 'form')
        ;

        $this->assertEquals("<form name='form-name-test' method='POST' action='save.php' class='form-horizontal' role='form'>\n</form>",
            $form->render()
            )
        ;
    }

    public function testVerificaSeConsegueCriarUmFormComVariosComponents()
    {
        $input = new Input();
        $input->setType('text')
            ->setValue('teste')
            ->setAttribute('name', 'input-test')
        ;
        $label = new Label('input-test');

        $fieldset = new FieldSet();
        $fieldset
            ->add($label)
            ->add($input)
        ;

        $form = new Form();
        $form->add($fieldset);

        $this->assertEquals("<form>\n\t<fieldset>\n\t<label for=''>input-test</label>\n\t<input type='text' value='teste' name='input-test' />\n</fieldset>\n</form>",
            $form->render()
        );
    }


} 