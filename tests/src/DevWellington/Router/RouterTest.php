<?php

namespace DevWellington\Router;

class RouterTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        // simulate url test
        $_SERVER['HTTP_HOST'] = 'localhost:8080';
        $_SERVER['REQUEST_URI'] = '';
    }

    public function tearDown()
    {
        $_SERVER['HTTP_HOST'] = null;
        $_SERVER['REQUEST_URI'] = null;
    }

    public function testVerificaSeAClasseRouterPertenceAInterfaceIRouter()
    {
        $baseUrl = "http://localhost:8080";

        $this->assertInstanceOf(
            '\DevWellington\Router\IRouter',
            new Router($baseUrl)
        );
    }

    public function testVerificaSeConsegueCriarAClasseProdutoRouter()
    {
        $baseUrl = "http://localhost:8080";

        $this->assertInstanceOf(
            '\DevWellington\Router\Router',
            new Router($baseUrl)
        );
    }

    public function testVerificaSeConsegueCapturarOControllerName()
    {
        $baseUrl = "http://localhost:8080/";

        $_SERVER['HTTP_HOST'] = 'localhost:8080';
        $_SERVER['REQUEST_URI'] = '/produto/index';

        $router = new Router($baseUrl);

        $this->assertEquals('\Application\Controller\ProdutoController', $router->getControllerName());
    }

    public function testVerificaSeConsegueCapturarAActionName()
    {
        $baseUrl = "http://localhost:8080/";

        $_SERVER['HTTP_HOST'] = 'localhost:8080';
        $_SERVER['REQUEST_URI'] = '/produto/index';

        $router = new Router($baseUrl);

        $this->assertEquals('indexAction', $router->getActionName());
    }

} 