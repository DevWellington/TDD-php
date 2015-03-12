<?php

namespace DevWellington\HTML\Components;

class Button extends AbstractComponent
{
    /**
     * @var string
     */
    private $text;

    /**
     * @return string
     */
    public function render()
    {
        return "<button{$this->getAttributes()}>{$this->text}</button>";
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $description
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

} 