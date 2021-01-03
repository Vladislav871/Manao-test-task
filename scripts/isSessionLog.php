<?php
    session_start();

    if (!empty($_SESSION)) {
        header('Location: /../Manao-test-task/main_page/main_page.php');
    }
