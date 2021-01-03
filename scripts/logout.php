<?php
    // Выход из сессии
    session_start();

    $_SESSION['name'] = null;

    session_destroy();

    header('Location: /../Manao-test-task/login_form/login.php');