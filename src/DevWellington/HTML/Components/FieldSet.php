<?php

namespace DevWellington\HTML\Components;

class FieldSet extends AbstractComponent
{
    /**
     * @var $components IComponent[]
     */
    private $components;

    /**
     * @param IComponent $component
     * @return $this
     */
    public function add(IComponent $component)
    {
        $this->components[] = $component;
        return $this;
    }

    /**
     * @return string
     */
    public function getComponents()
    {
        return $this->components;
    }

    public function renderComponents()
    {
        $fs = "";
        if (is_array($this->components))
            foreach($this->components as $key=>$value)
                $fs .= "\t".$value->render()."\n";

        return $fs;
    }

    /**
     * @return string
     */
    public function render()
    {
        $attr = $this->getAttributes();
        $components = $this->renderComponents();

        return "<fieldset{$attr}>\n{$components}</fieldset>";
    }

}