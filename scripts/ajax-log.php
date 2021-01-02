<?php
    require __DIR__."/../Classes/DataBase.php";
    require __DIR__."/../Classes/User.php";
    require __DIR__."/../Classes/LoginValidate.php";

    $validator = new LoginValidate($_POST);

    $error = $validator->validate();

    header("Content-type: application/json");

    if (empty($error)) {
        $login = $_POST['login'];
        $pass = $_POST['pass'];

        $db = new DataBase();
        $user = new User($login, $pass);

        $result = $db->isUser($user->getLogin(), $user->getPassword());

        if ($result) {
            $userInfo = $db->getUser($login);

            $name = $userInfo['name'];
            $email = $userInfo['email'];

            setcookie('login', $login);
            setcookie('name', (string)$name);
            setcookie('email', (string)$email);

            session_start();

            $_SESSION['name'] = (string)$name;

            $res = array(
                'redirect' => '/../Manao-test-task/main_page/main_page.php'
            );

            echo json_encode($res);
        } else {
            $res = array(
                'message' => 'User doesn\'t exist!'
            );

            echo json_encode($res);
        }
    } else {
        echo json_encode($error);
    }

