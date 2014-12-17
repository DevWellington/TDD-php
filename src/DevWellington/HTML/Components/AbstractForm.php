<?php

namespace DevWellington\HTML\Components;

abstract class AbstractForm extends AbstractComponent implements IForm
{
    /**
     * @var mixed
     */
    protected $name;
    protected $method;
    protected $action;

    public function render(){}

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->setAttribute('action', $action);

        $this->action = $action;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->setAttribute('method', $method);

        $this->method = $method;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->setAttribute('name', $name);

        $this->name = $name;
        return $this;
    }

} 