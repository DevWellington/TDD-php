<?php

namespace DevWellington\HTML\Components;

interface IOption
{
    public function render();
    public function setValue($value);
    public function setDescription($description);
} 