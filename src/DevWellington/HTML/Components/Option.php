<?php

namespace DevWellington\HTML\Components;

class Option implements IOption
{
    private $value;
    private $description;

    public function __construct($value = null, $description = null)
    {
        $this->value = $value;
        $this->description = $description;
    }

    public function render()
    {
        return "<option value='{$this->value}'>$this->description</option>";
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

} 