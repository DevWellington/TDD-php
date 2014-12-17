<?php

namespace DevWellington\HTML\Components;

class Input extends AbstractComponent
{
    /**
     * @var mixed
     */
    private $value;
    private $type;

    public function render()
    {
        $attr = $this->getAttributes();

        return "<input{$attr} />";
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->attributes['type'] = $type;
        $this->type = $type;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->attributes['value'] = $value;
        $this->value = $value;

        return $this;
    }

}