<?php
    require __DIR__ . '/../Classes/FormValidate.php';
    require __DIR__.'/../Classes/User.php';
    require __DIR__.'/../Classes/DataBase.php';

    $validator = new FormValidate($_POST);

    header('Content-Type: application/json');

    $result = $validator->validate();

    if (empty($result)) {

        $login = $_POST['login'];
        $pass = $_POST['pass'];
        $email = $_POST['email'];
        $name = $_POST['name'];

        $db = new DataBase();
        $user = new User($login, $pass, $email, $name);

        $check = $db->insert($user->getLogin(), $user->getPassword(), $user->getEmail(), $user->getName());

        if ($check != null) {
            echo json_encode($check);
            exit;
        }

        $_SESSION['authorization'] = true;

        $result = array(
            'redirect' => '/../Manao-test-task/main_page/main_page.php'
        );

        echo json_encode($result);
    } else {
        echo json_encode($result);
    }