<?php

namespace DevWellington\Validator;

use DevWellington\Request\Request;

abstract class AbstractValidator extends Request implements IValidator
{
    abstract public function validate($data);
} 