<?php

namespace DevWellington\HTML\Components;

interface IForm
{
    public function setName($name);
    public function setMethod($method);
    public function setAction($action);

    public function getName();
    public function getMethod();
    public function getAction();

} 