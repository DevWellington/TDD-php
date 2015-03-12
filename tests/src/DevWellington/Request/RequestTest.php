<?php

namespace DevWellington\Request;

class RequestTest extends \PHPUnit_Framework_TestCase
{
    public function testVerificaSeAClasseRequestPertenceAInterfaceIRequest()
    {
        $rqst = new Request();
        $this->assertInstanceOf('\DevWellington\Request\IRequest', $rqst);
    }

    public function testVerificaSeConsegueCriarAClasseRequest()
    {
        $rqst = new Request();
        $this->assertInstanceOf('\DevWellington\Request\Request', $rqst);
    }

}