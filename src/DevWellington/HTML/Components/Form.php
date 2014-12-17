<?php

namespace DevWellington\HTML\Components;

class Form
{
    /**
     * @var mixed
     */
    private $name;
    private $method;
    private $action;

    /**
     * @var array
     */
    private $attributes;

    /**
     * @return string
     */
    public function render()
    {
        $attr = $this->getAttributes();

        return "<form{$attr}>\n</form>";
    }

    public function setAttribute($name, $value){

        $this->attributes[$name] = $value;
        return $this;
    }

    public function getAttributes()
    {
        $attr = "";
        if (is_array($this->attributes))
            foreach($this->attributes as $key => $value){
                $attr .= " {$key}='{$value}'";
            }

        return $attr;
    }


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