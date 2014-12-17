<?php

namespace DevWellington\HTML\Components;

class Label extends AbstractComponent
{
    /**
     * @var string
     */
    private $for;

    /**
     * @var string
     */
    private $description;

    /**
     * @param $description
     * @param null $for
     */
    public function __construct($description, $for = NULL)
    {
        $this->description = $description;
        $this->for = $for;
    }

    /**
     * @return string
     */
    public function render()
    {
        $attr = $this->getAttributes();
        return "<label for='{$this->for}'{$attr}>{$this->description}</label>";
    }

    /**
     * @return string
     */
    public function getFor()
    {
        return $this->for;
    }

    /**
     * @param $for
     * @return $this
     */
    public function setFor($for)
    {
        $this->for = $for;
        return $this;
    }

    /**
     * @param $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

} 