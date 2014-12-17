<?php

namespace DevWellington\HTML\Components;

abstract class AbstractComponent implements IComponent
{

    /**
     * @var array
     */
    protected $attributes;

    abstract public function render();

    public function setAttribute($name, $value)
    {
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

}