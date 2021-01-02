<?php
class User
{
    private $login;
    private $password;
    private $email;
    private $name;

    public function __construct($login = null, $password = null, $email = null, $name = null)
    {
        $this->login = $login;
        $this->password = $this->hashPassword($password);
        $this->email = $email;
        $this->name = $name;
    }

    public function hashPassword($password) {
        return "sjkahwhb11918".md5($password);
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}