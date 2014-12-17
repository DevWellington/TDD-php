<?php

namespace DevWellington\HTML\Components;

interface IComponent
{
    public function render();
    public function setAttribute($name, $value);
} 