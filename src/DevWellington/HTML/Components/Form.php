<?php

namespace DevWellington\HTML\Components;

class Form extends AbstractForm
{
    /**
     * @return string
     */
    public function render()
    {
        $attr = $this->getAttributes();

        return "<form{$attr}>\n</form>";
    }


} 