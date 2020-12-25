<?php

$login = $_GET['login'];
$password = $_GET['pass'];
$email = $_GET['email'];
$name = $_GET['name'];

if (empty($login) || empty($password) || empty($email) || empty($name) || ($_GET['pass'] != $_GET['confirm_pass'])) {
    $logMistake = null;
    $passMistake = null;
    $confirmMistake = null;
    $emailMistake = null;
    $nameMistake = null;

    if (empty($login)) {
        $logMistake = "Input login!";
    } else if (!preg_match('//^[A-Za-z0-9]{6,}$//', $login)) {
        $logMistake = "Login must consist of A-z, 0-9 and mustn't consist less than 6 symb!";
    }
    if (empty($password)) {
        $passMistake = "Input password!";
    } else if (count($password) < 6) {
        $passMistake = "Password mustn't be less 6 symb!";
    } else if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])$/', $password)) {
        $passMistake = "Password must consist of at least 1 number, letters in different registers and special symbols!";
    }
    if ($password != $_GET['confirm_pass']) {
        $confirmMistake = "Passwords aren't equal!";
    }
//    if (empty($email)) {
//        $emailMistake = "Input e-mail...";
//    } else if (empty($name)) {
//        $nameMistake = "Input name...";
//    }

    header('Content-type: application/json');

    $result = array(
        'login' => $logMistake,
        'pass' => $passMistake,
        'confirmPass' => $confirmMistake,
        'email' => $emailMistake,
        'names' => $nameMistake
    );

    echo json_encode($result);
} else {
    $host = 'localhost';
    $user = 'root';
    $pass = 'root';
    $db = 'manao';

    $link = mysqli_connect($host, $user, $pass, $db);

    $equalLogin = null;
    $equalEmail = null;
    $equalName = null;

    if ($link) {
        $query = mysqli_query($link, "SELECT * FROM users");

        if (mysqli_num_rows($query) == 0) {
            $query = mysqli_query($link, "INSERT INTO users (login, pass, email, name) VALUES ('$login', '$password', '$email', '$name')");
        }

        if (mysqli_num_rows($query) != 0) {
            for ($i = 0; $i <= mysqli_num_rows($query); $i++) {
                $row = mysqli_fetch_row($query);
                for ($j = 0; $j < 4; $j++) {
                    if ($row[0] == $login) {
                        $equalLogin = "is already used...";
                    }
                    if ($row[2] == $email) {
                        $equalEmail = "is already used...";
                    }
                }
            }

            if ($equalLogin != null || $equalEmail != null || $equalName != null) {
                header('Content-type: application/json');

                $result = array(
                    'login' => $equalLogin,
                    'email' => $equalEmail,
                );

                echo json_encode($result);
            } else {
                $query = mysqli_query($link, "INSERT INTO users (login, pass, email, name) VALUES ('$login', '$password', '$email', '$name')");
            }
        }

        mysqli_close($link);
    }
}
