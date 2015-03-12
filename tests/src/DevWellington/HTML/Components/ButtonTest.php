<?php

namespace DevWellington\HTML\Components;

class ButtonTest extends \PHPUnit_Framework_TestCase
{
    public function testVerificaSeAClasseFieldSetPertenceAInterfaceIComponent()
    {
        $btn = new Button();
        $this->assertInstanceOf('\DevWellington\HTML\Components\IComponent', $btn);
    }

    public function testVerificaSeConsegueCriarAClasseFieldSet()
    {
        $btn = new Button();
        $this->assertInstanceOf('\DevWellington\HTML\Components\Button', $btn);
    }

    public function testVerificaSeConsegueCriarUmFieldSetSemAtributos()
    {
        $btn = new Button();
        $this->assertEquals("<button></button>", $btn->render());
    }

    public function testVerificaSeConsegueInserirUmAtributoEUmTexto()
    {
        $btn = new Button();
        $btn
            ->setAttribute('name', 'button-name')
            ->setText('TEXT')
        ;

        $this->assertEquals("<button name='button-name'>TEXT</button>", $btn->render());
        $this->assertEquals("TEXT", $btn->getText());
    }

}