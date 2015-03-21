<?php

namespace DevWellington\Validator;

abstract class AbstractFormValidator implements IValidator
{
    protected $data;

    public function validate($data)
    {
        $this->data = $data;
    }

    public function isValid()
    {
        return $this->validate($this->data);
    }

} 