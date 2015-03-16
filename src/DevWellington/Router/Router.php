<?php

namespace DevWellington\Router;

/**
 * Class Router
 * @package DevWellington\Router
 * @author DevWellington
 *
 * Obs.: Esta classe foi criada somente para testes.
 *  Quando for necessário a utilização de roteadores deve-se
 *  utilizar um Framework (ou Micro Framework).
 *      Exemplo: Silex, Slim, etc.
 *
 */
class Router implements IRouter
{
    /**
     * @var string
     */
    private $controllerName = '';

    /**
     * @var string
     */
    private $actionName = '';

    /**
     * @param $baseUrl
     */
    public function __construct($baseUrl)
    {
        $requestUrl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $requestString = substr($requestUrl, strlen($baseUrl));

        $urlParams = explode('/', filter_var($requestString, FILTER_SANITIZE_URL));

        $this->controllerName = '\Application\Controller\\'.ucfirst(array_shift($urlParams));
        $this->actionName = strtolower(array_shift($urlParams));
    }

    /**
     * @return string
     */
    public function getActionName()
    {
        return $this->actionName.'Action';
    }

    /**
     * @return string
     */
    public function getControllerName()
    {
        return $this->controllerName.'Controller';
    }

} 