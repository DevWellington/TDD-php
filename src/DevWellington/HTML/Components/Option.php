<?php

namespace DevWellington\HTML\Components;

class Option implements IOption
{
    private $value;
    private $description;
    /**
     * @var bool
     */
    private $selected = false;

    public function __construct($value = null, $description = null)
    {
        $this->value = $value;
        $this->description = $description;
    }

    public function render()
    {
        $selected = "";
        if ($this->isSelected())
            $selected = " selected";

        return "<option value='{$this->value}'{$selected}>$this->description</option>";
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

    /**
     * @return boolean
     */
    public function isSelected()
    {
        return $this->selected;
    }

    /**
     * @param boolean $selected
     */
    public function setSelected($selected)
    {
        $this->selected = $selected;
        return $this;
    }

}