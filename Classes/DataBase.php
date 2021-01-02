<?php
class DataBase
{
    private $xmlFile;
    private $rootUsers;
    private $errors = [];

    public function __construct()
    {
        $this->xmlFile = new DOMDocument('1.0');

        if(!$this->xmlFile->load('D:\OpenServer\domains\manao.task\Manao-test-task\database\users.xml')) {
            $this->rootUsers = $this->xmlFile->appendChild($this->xmlFile->createElement('users'));
            $this->xmlFile->formatOutput = true;

            $usersFile = $this->xmlFile->saveXML();
            $this->xmlFile->save('D:\OpenServer\domains\manao.task\Manao-test-task\database\users.xml');
            $this->rootUsers = simplexml_load_file('D:\OpenServer\domains\manao.task\Manao-test-task\database\users.xml');
        } else {
            $this->rootUsers = simplexml_load_file('D:\OpenServer\domains\manao.task\Manao-test-task\database\users.xml');
        }
    }

    public function insert($login, $pass, $email, $name) {
        $users = $this->rootUsers;

        foreach ($users->user as $user) {
            if ($user->login == $login) {
                $this->addError('The login is already used!', 'login');
            }
            if ($user->email == $email) {
                $this->addError('The e-mail is already used!', 'email');
            }
        }

        if (!empty($this->errors)) {
            return $this->errors;
        } else {
            $user = $users->addChild('user');
            $user->addChild('login', $login);
            $user->addChild('password', $pass);
            $user->addChild('email', $email);
            $user->addChild('name', $name);

            file_put_contents('D:\OpenServer\domains\manao.task\Manao-test-task\database\users.xml', $users->asXML());

            return null;
        }
    }

    public function deleteNode($login) {
        $users = $this->rootUsers;

        for ($i = 0; $i < count($users->user); $i++) {
            if ($users->user[$i]->login == $login) {
                unset($users->user[$i]);
            }
        }

        file_put_contents('D:\OpenServer\domains\manao.task\Manao-test-task\database\users.xml', $users->asXML());
    }

    public function upgradeNode($login, $loginChange = null, $pass = null, $email = null, $name = null) {
        $users = $this->rootUsers;

        foreach ($users->user as $user) {
            if ($user->login == $login) {
                if ($loginChange != null) {
                    $user->login = $loginChange;
                }
                if ($pass != null) {
                    $user->password = $this->hashPassword($pass);
                }
                if ($email != null) {
                    $user->email = $email;
                }
                if ($name != null) {
                    $user->name = $name;
                }
            }
        }

        file_put_contents('D:\OpenServer\domains\manao.task\Manao-test-task\database\users.xml', $users->asXML());
    }

    public function isUser($login, $pass) {
        $users = $this->rootUsers;

        foreach ($users->user as $user) {
            if ($user->login == $login && $user->password = $pass) {
                return true;
            }
        }

        return false;
    }

    public function getUser($login) {
        $users = $this->rootUsers;

        foreach ($users->user as $user) {
            if ($user->login == $login) {
                return array('login' => $user->login, 'email' => $user->email[0], 'name' => $user->name[0]);
            }
        }

        return null;
    }

    public function addError($message, $name) {
        $this->errors = array_merge($this->errors, array($name => $message));
    }

    public function hashPassword($password) {
        return "sjkahwhb11918".md5($password);
    }
}