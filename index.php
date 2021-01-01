<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style1.css">
    <link rel="shortcut icon" type="image/png" href="./assets/favicon/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manao company</title>
</head>
<body>
<section class="container">
    <div id="container__registration">
        <div id="registration-decor">
            <h1>Registration</h1>
        </div>
        <form id="registration" class="registration-fields" action="#" method="post">
            <div class="field">
                <p>Login</p>
                <input name="login" type="text">
                <div id="loginMessage"><span></span></div>
            </div>
            <div class="field">
                <p>Password</p>
                <input name="pass" type="text">
                <div id="passMessage"><span></span></div>
            </div>
            <div class="field">
                <p>Confirm password</p>
                <input name="confirm_pass" type="text">
                <div id="confirmMessage"><span></span></div>
            </div>
            <div class="field">
                <p>E-mail</p>
                <input name="email" type="email">
                <div id="emailMessage"><span></span></div>
            </div>
            <div class="field">
                <p>Name</p>
                <input name="name" type="text">
                <div id="nameMessage"><span></span></div>
            </div>
            <p>If you already have an account <a href="login_form/login.php">login in</a></p>
            <button name="submit" type="submit"><p>Create</p></button>
        </form>
    </div>
</section>
<script src="scripts/jquery-3.5.1.min.js"></script>
<script src="scripts/ajax-query_reg.js"></script>
</body>
</html>