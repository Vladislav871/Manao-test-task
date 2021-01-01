<?php
    require __DIR__."/../Classes/DataBase.php";
    require __DIR__."/../Classes/User.php";

    $login = $_POST['login'];
    $pass = $_POST['pass'];

    header("Content-type: application/json");

    $db = new DataBase();
    $user = new User($login, $pass);

    $result = $db->isUser($user->getLogin(), $user->getPassword());

    if ($result) {
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