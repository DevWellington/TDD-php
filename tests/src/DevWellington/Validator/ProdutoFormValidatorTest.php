<?php

namespace DevWellington\Validator;

class ProdutoFormValidatorTest extends \PHPUnit_Framework_TestCase
{
    public function testVerificaSeAClasseProdutoFormValidatorPertenceAInterfaceIValidator()
    {
        $this->assertInstanceOf(
            '\DevWellington\Validator\IValidator',
            new ProdutoFormValidator()
        );
    }

    public function testVerificaSeConsegueCriarAClasseProdutoFormValidator()
    {
        $this->assertInstanceOf(
            '\DevWellington\Validator\ProdutoFormValidator',
            new ProdutoFormValidator()
        );
    }

    public function testVerificaSeOFormEstaValido()
    {
        $formValidate = new ProdutoFormValidator();
        $formValidate->validate(array('Valor 1', 'Valor 2'));

        $this->assertTrue($formValidate->isValid());
    }


} 