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

    public function testVerificaSeOFormEstaValidoPassandoValoresInvalidos()
    {
        $formInvalid = new ProdutoFormValidator();
        $formInvalid->validate(
            array(
                'nome' => null,
                'valor' => 'R$ 40,00',
                'descricao' => 'Mouse USB marca Logitech',
                'categoria' => 2
            )
        );

        $this->assertFalse($formInvalid->isValid());
        $this->assertTrue(is_array($formInvalid->getInvalidFields()));
        $this->assertEquals('Campo [Nome] nao foi preenchido.', $formInvalid->getInvalidFields()['nome']);
        $this->assertEquals('Campo [Valor] nao eh numerico.', $formInvalid->getInvalidFields()['valor']);
    }

    public function testVerificaSeOFormEstaValidoPassandoValoresValidos()
    {
        $formValid = new ProdutoFormValidator();
        $formValid->validate(
            array(
                'nome' => 'nome do produto',
                'valor' => 40,
                'descricao' => 'Mouse USB marca Logitech',
                'categoria' => 2
            )
        );

        $this->assertTrue($formValid->isValid());
        $this->assertTrue(is_array($formValid->getInvalidFields()));
    }

}