<?php
    require __DIR__ . '/../Classes/FormValidate.php';
    require __DIR__.'/../Classes/User.php';

    $validator = new FormValidate($_GET);

    header('Content-Type: application/json');

    $result = $validator->validate();

    if (empty($result)) {
        $xml = new DOMDocument('1.0', 'utf-8');

        $user = new User($_GET['login'], $_GET['pass'], $_GET['email'], $_GET['name']);

        $login = $user->getLogin();
        $pass = $user->getPassword();
        $email = $user->getEmail();
        $name = $user->getName();

        if ($xml->load('D:\OpenServer\domains\manao.task\Manao-test-task\database\users.xml')) {

        } else {
            $usersTag = $xml->appendChild($xml->createElement('users'));
            $userTag = $usersTag->appendChild($xml->createElement('user'));
            $loginTag = $userTag->appendChild($xml->createElement('login'));
            $loginTag->appendChild($xml->createTextNode($login));
            $passTag = $userTag->appendChild($xml->createElement('password'));
            $passTag->appendChild($xml->createTextNode($pass));
            $emailTag = $userTag->appendChild($xml->createElement('email'));
            $emailTag->appendChild($xml->createTextNode($email));
            $nameTag = $userTag->appendChild($xml->createElement('name'));
            $nameTag->appendChild($xml->createTextNode($name));

            $xml->formatOutput = true;
            $file = $xml->saveXML();
            $xml->save('D:\OpenServer\domains\manao.task\Manao-test-task\database\users.xml');
        }
    } else {
        echo json_encode($result);
    }