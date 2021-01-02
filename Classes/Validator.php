<?php

abstract class Validator {
    private $error = [];

    abstract function validate();

    public function addError($message, $name) {
        $this->error = array_merge($this->error, array($name => $message));
    }

    public function getError() {
        return $this->error;
    }
}