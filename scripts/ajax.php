<?php
    require __DIR__.'/../Classes/FormValidate.php';
    require __DIR__.'/../Classes/User.php';

    $validator = new FormValidate($_GET);

    header('Content-Type: application/json');

    $result = $validator->validate();

    if (empty($result)) {
        $user = new User($_GET['login'], $_GET['pass'], $_GET['email'], $_GET['name']);
    } else {
        echo json_encode($result);
    }