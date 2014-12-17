<?php

namespace DevWellington\HTML\Components;

class FieldSet extends AbstractComponent
{
    /**
     * @var array of IComponent
     */
    private $components;

    public function add(IComponent $component)
    {
        $this->components[] = $component;
        return $this;
    }

    public function render()
    {
        $attr = $this->getAttributes();
        $components = $this->getComponents();

        return "<fieldset{$attr}>\n{$components}</fieldset>";
    }

    public function getComponents()
    {
        $fs = "";
        if (is_array($this->components))
            foreach($this->components as $key=>$value)
                $fs .= "\t".$value->render()."\n";

        return $fs;
    }
} 