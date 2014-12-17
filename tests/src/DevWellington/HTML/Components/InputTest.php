<?php

namespace DevWellington\HTML\Components;

class InputTest extends \PHPUnit_Framework_TestCase
{
    public function testVerificaSeAClasseFieldSetPertenceAInterfaceIComponent()
    {
        $input = new Input();
        $this->assertInstanceOf('\DevWellington\HTML\Components\IComponent', $input);
    }

    public function testVerificaSeConsegueCriarAClasseFieldSet()
    {
        $input = new Input();
        $this->assertInstanceOf('\DevWellington\HTML\Components\Input', $input);
    }

    public function testVerificaSeConsegueCriarUmFieldSetSemAtributos()
    {
        $input = new Input();
        $this->assertEquals("<input />", $input->render());
    }

    public function testVerificaSeConsegueInserirAtributos()
    {
        $input = new Input();
        $input->setType('submit');

        $this->assertEquals(" type='submit'", $input->getAttributes());
        $this->assertEquals('submit', $input->getType());

        $input->setValue('value-of-input');

        $this->assertEquals(" type='submit' value='value-of-input'", $input->getAttributes());
        $this->assertEquals('value-of-input', $input->getValue());
    }

    public function testVerificaseConsegueCriarUmFieldSetComUmAtributo()
    {
        $input = new Input();
        $input->setAttribute('name', 'input-name');

        $this->assertEquals("<input name='input-name' />", $input->render());
    }
} 