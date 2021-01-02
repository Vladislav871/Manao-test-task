<?php

require_once __DIR__.'/../Classes/Validator.php';

class LoginValidate extends Validator
{
    private $fields = [];

    public function __construct(array $fields)
    {
        $this->fields = $fields;
    }

    function validate()
    {
        if (empty($this->fields['login'])) {
            $this->addError('Empty field!', 'login');
        }

        if (empty($this->fields['pass'])) {
            $this->addError('Empty field!', 'pass');
        }

        return $this->getError();
    }
}