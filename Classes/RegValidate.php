<?php

require_once __DIR__.'/../Classes/Validator.php';

class RegValidate extends Validator
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
        } else if (mb_strlen($this->fields['login']) < 6) {
            $this->addError('Login mustn\'t be less than 6 symbols!', 'login');
        } else if (preg_match('/[!@#$%^&*()_+=\-\.?"\',`~№]+/', $this->fields['login'])) {
            $this->addError('Login mustn\'t consist of special symbols!', 'login');
        }

        if (empty($this->fields['pass'])) {
            $this->addError('Empty field!', 'pass');
        } else if (mb_strlen($this->fields['pass']) < 6) {
            $this->addError('Password mustn\'t be less than 6 symbols!', 'pass');
        } else if (!preg_match('/(?=.*\d)(?=.*[!@#$%^&*])(?=.*[A-Z])(?=.*[a-z])[0-9A-Za-z!@#$%^&*]/', $this->fields['pass'])) {
            $this->addError('Password must consist of at least 1 number, letters in different register and special symbol!', 'pass');
        }

        if (empty($this->fields['email'])) {
            $this->addError('Empty field!', 'email');
        } else if (!preg_match('/(\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6})/', $this->fields['email'])) {
            $this->addError('Incorrect e-mail!', 'email');
        }

        if (empty($this->fields['confirm_pass'])) {
            $this->addError('Empty field!', 'confirm_pass');
        } else if ($this->fields['confirm_pass'] != $this->fields[pass]) {
            $this->addError('Passwords aren\'t equal!', 'confirm_pass');
        }

        if (empty($this->fields['name'])) {
            $this->addError('Empty field!', 'names');
        } else if (!preg_match('/^([A-Za-z0-9]+)([!@#$%^&*]{2})[A-Za-z0-9]+$|^([A-Za-z0-9]+)[A-Za-z0-9]+([!@#$%^&*]{2})$|^([!@#$%^&*]{2})([A-Za-z0-9]+)[A-Za-z0-9]+$/', $this->fields['name'])) {
            $this->addError('Name must consist of 2 special symbols, letters and numbers!', 'names');
        }

        return $this->getError();
    }
}
