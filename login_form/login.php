<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="shortcut icon" type="image/png" href="../assets/favicon/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manao company</title>
</head>
<body>
<section class="container">
    <div id="container__login">
        <div id="login-decor">
            <h1>Login</h1>
        </div>
        <form id="login" class="login-fields" action="#" method="post">
            <div class="field">
                <p>Login</p>
                <input name="login" type="text" required>
                <div id="loginMessage"><span></span></div>
            </div>
            <div class="field">
                <p>Password</p>
                <input name="pass" type="text" required>
                <div id="passMessage"><span></span></div>
            </div>
            <p>If you don't have an account <a href="../index.php">sign up</a></p>
            <button type="submit"><p>Login in</p></button>
        </form>
    </div>
</section>
<script src="../scripts/jquery-3.5.1.min.js"></script>
<script src="../scripts/ajax-query_log.js"></script>
</body>
</html>