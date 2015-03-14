<?php

namespace DevWellington\HTML\Components;

class OptionTest extends \PHPUnit_Framework_TestCase
{
    public function testVerificaSePertenceAInterfaceIOption()
    {
        $op = new Option();
        $this->assertInstanceOf('\DevWellington\HTML\Components\IOption', $op);
    }

    public function testVerificarSeConsegueAClasseOption()
    {
        $op = new Option();
        $this->assertInstanceOf('\DevWellington\HTML\Components\Option', $op);
    }

    public function testVerificaSeConsegueInserirAtributosNoComponenteOption()
    {
        $op = new Option();
        $op
            ->setValue(0)
            ->setDescription('Opcao 0')
        ;

        $this->assertEquals(0, $op->getValue());
        $this->assertEquals('Opcao 0', $op->getDescription());
    }

    public function testVerificaSeOptionIsSelected()
    {
        $op = new Option();
        $op
            ->setValue(0)
            ->setDescription("TESTE 0")
            ->setSelected(true)
        ;

        $this->assertTrue($op->isSelected());
    }
} 