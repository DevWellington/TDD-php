<?php

namespace DevWellington\HTML\Components;


class LabelTest extends \PHPUnit_Framework_TestCase
{
    public function testVerificaSeAClasseFieldSetPertenceAInterfaceIComponent()
    {
        $label = new Label('input-test');
        $this->assertInstanceOf('\DevWellington\HTML\Components\IComponent', $label);
    }

    public function testVerificaSeConsegueCriarAClasseFieldSet()
    {
        $label = new Label('input-test');
        $this->assertInstanceOf('\DevWellington\HTML\Components\Label', $label);
    }

    public function testVerificaSeConsegueCriarUmFieldSetComAtributoFor()
    {
        $label = new Label('','input-test');
        $this->assertEquals("<label for='input-test'></label>", $label->render());
    }

    public function testVerificaSeConsegueSetarADescricaoDoLabel()
    {
        $label = new Label('input-test');
        $this->assertEquals("<label for=''>input-test</label>", $label->render());
    }

    public function testVerificaSeConsegueInserirAtributos()
    {
        $label = new Label(NULL);
        $label
            ->setDescription('Description of Label: ')
            ->setFor('-')
            ->setAttribute('class', 'class-of-label')
        ;

        $this->assertEquals("<label for='-' class='class-of-label'>Description of Label: </label>", $label->render());
        $this->assertEquals('-', $label->getFor());
        $this->assertEquals('Description of Label: ', $label->getDescription());
    }

}