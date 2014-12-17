<?php

namespace DevWellington\HTML\Components;

class FieldSetTest extends \PHPUnit_Framework_TestCase
{
    public function testVerificaSeAClasseFieldSetPertenceAInterfaceIComponent()
    {
        $fs = new FieldSet();
        $this->assertInstanceOf('\DevWellington\HTML\Components\IComponent', $fs);
    }

    public function testVerificaSeConsegueCriarAClasseFieldSet()
    {
        $fs = new FieldSet();
        $this->assertInstanceOf('\DevWellington\HTML\Components\FieldSet', $fs);
    }

    public function testVerificaSeConsegueCriarUmFieldSetSemAtributos()
    {
        $fs = new FieldSet();
        $this->assertEquals("<fieldset>\n</fieldset>", $fs->render());
    }

    public function testVerificaSeConsegueInserirUmAtributo()
    {
        $fs = new FieldSet();
        $fs->setAttribute('name', 'fieldset-name');

        $this->assertEquals(" name='fieldset-name'", $fs->getAttributes());
    }

    public function testVerificaseConsegueInserirUmComponentNoFieldSet()
    {
        $fs = new FieldSet();
        $input = new Input();
        $input->setAttribute('name', 'input-test');

        $fs->setAttribute('name', 'fieldset-test-input')
            ->add($input)
        ;

        $this->assertEquals("<fieldset name='fieldset-test-input'>\n\t<input name='input-test' />\n</fieldset>", $fs->render());
    }

    public function testVerificaSeConsegueCriarUmFieldSetComLabelEInput()
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

        $this->assertEquals("<fieldset>\n\t<label for=''>input-test</label>\n\t<input type='text' value='teste' name='input-test' />\n</fieldset>",
            $fieldset->render()
        );
    }

} 