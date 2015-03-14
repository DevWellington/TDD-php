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
    public function setOptions(array $options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @return IOption[]
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @return string
     */
    public function render()
    {
        $attr = $this->getAttributes();
        $components = $this->renderOptions();

        return "<select{$attr}>\n{$components}</select>";
    }

    /**
     * @return string
     */
    public function renderOptions()
    {
        $sl = "";
        if (is_array($this->options))
            foreach($this->options as $key=>$value)
                $sl .= "\t".$value->render()."\n";

        return $sl;
    }
}