<?php

namespace DevWellington\HTML\Components;

class SelectTest extends \PHPUnit_Framework_TestCase
{
    public function testVerificaSeAClasseSelectPertenceAInterfaceIComponent()
    {
        $sl = new Select();
        $this->assertInstanceOf('\DevWellington\HTML\Components\IComponent', $sl);
    }

    public function testVerificaSeConsegueCriarAClasseSelect()
    {
        $sl = new Select();
        $this->assertInstanceOf('\DevWellington\HTML\Components\Select', $sl);
    }

    public function testVerificaSeConsegueCriarUmFieldSetSemAtributos()
    {
        $sl = new Select();
        $this->assertEquals("<select>\n</select>", $sl->render());
    }

    public function testVerificaSeConsegueInserirUmAtributo()
    {
        $sl = new Select();
        $sl->setAttribute('name', 'select-name');

        $this->assertEquals(" name='select-name'", $sl->getAttributes());
    }

    public function testVerificaseConsegueInserirUmComponentOptionNoSelect()
    {
        $sl = new Select();
        $option = new Option();
        $option
            ->setValue(0)
            ->setDescription("Opcao 0")
        ;

        $sl->setAttribute('name', 'select-test-option')
            ->add($option)
        ;

        $this->assertEquals("<select name='select-test-option'>\n\t<option value='0'>Opcao 0</option>\n</select>", $sl->render());
    }

} 