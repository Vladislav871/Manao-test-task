<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
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
        <form class="registration-fields" action="#" method="post">
            <div class="field">
                <p>Login(unique)</p>
                <input type="text" required>
            </div>
            <div class="field">
                <p>Password</p>
                <input type="text" required>
            </div>
            <div class="field">
                <p>Confirm password</p>
                <input type="text" required>
            </div>
            <div class="field">
                <p>E-mail(unique)</p>
                <input type="email" required>
            </div>
            <div class="field">
                <p>Name</p>
                <input type="text" required>
            </div>
            <p>If you already have an account <a href="login_form/login.php">login in</a></p>
            <button type="submit"><p>Create</p></button>
        </form>
    </div>
</section>
</body>
</html>