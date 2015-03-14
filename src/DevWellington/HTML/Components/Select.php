<?php

namespace DevWellington\HTML\Components;

class Select extends AbstractComponent
{

    /**
     * @var $options IOption[]
     */
    private $options;


    /**
     * @param IOption $component
     * @return $this
     */
    public function add(IOption $option)
    {
        $this->options[] = $option;
        return $this;
    }

    /**
     * @param array $options
     * @return $this
     */
    public function setComponents(array $component)
    {
        $this->options = $component;
        return $this;
    }

    /**
     * @return IOption[]
     */
    public function getComponents()
    {
        return $this->options;
    }

    /**
     * @return string
     */
    public function render()
    {
        $attr = $this->getAttributes();
        $components = $this->getOptions();

        return "<select{$attr}>\n{$components}</select>";
    }

    /**
     * @return string
     */
    public function getOptions()
    {
        $sl = "";
        if (is_array($this->options))
            foreach($this->options as $key=>$value)
                $sl .= "\t".$value->render()."\n";

        return $sl;
    }
} 