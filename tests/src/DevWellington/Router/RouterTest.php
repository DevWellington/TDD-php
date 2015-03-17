<?php

namespace DevWellington\Router;

class RouterTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        // simulate url test
        $_SERVER['HTTP_HOST'] = 'localhost';
        $_SERVER['REQUEST_URI'] = '/produto/index';
    }

    public function tearDown()
    {
        $_SERVER['HTTP_HOST'] = null;
        $_SERVER['REQUEST_URI'] = null;
    }

    public function testVerificaSeAClasseRouterPertenceAInterfaceIRouter()
    {
        $baseUrl = "http://localhost/produto/index";

        $this->assertInstanceOf(
            '\DevWellington\Router\IRouter',
            new Router($baseUrl)
        );
    }

    public function testVerificaSeConsegueCriarAClasseProdutoRouter()
    {
        $baseUrl = "http://localhost/Produto/index";

        $this->assertInstanceOf(
            '\DevWellington\Router\Router',
            new Router($baseUrl)
        );
    }

} 