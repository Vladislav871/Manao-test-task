<?php
    session_start();

    if (empty($_SESSION['name'])) {
        header('Location: /../Manao-test-task/index.php');
    }

    function sayHello($name) {
        echo "Hello, ".$name."!";
    }
