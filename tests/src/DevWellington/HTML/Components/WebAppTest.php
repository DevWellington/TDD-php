<?php

namespace WebTest;

class WebAppTest extends \PHPUnit_Extensions_Selenium2TestCase
{
    public function setUp()
    {
        $this->setBrowser("firefox");
        $this->setBrowserUrl("http://localhost:9090/produto/index");
    }

    public function testVerificaTitle()
    {
        $this->url("http://localhost:9090/produto/index");

        $this->assertEquals('TDD com PHP', $this->title());
    }

    public function testVerificaSeCampoNomeEstaPreenchido()
    {
        $this->url("/");
        $campoNome = $this->byName("nome");
        
        $this->assertEquals('Mouse USB', $campoNome->value());
    }

    public function testVerificaSeRetornouOErroCorretamenteLI()
    {
        $this->url("/");
        $li = $this->byCssSelector("li")->text();
        
        $this->assertContains("Campo [Valor] nao eh numerico.", $li);
    }      
}