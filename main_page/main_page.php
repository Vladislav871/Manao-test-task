<?php
    session_start();

    if (empty($_SESSION['name'])) {
        header('Location: /../Manao-test-task/index.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="main_page.css">
    <link rel="shortcut icon" type="image/png" href="../assets/favicon/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../scripts/exit.js"></script>
    <title>Manao company</title>
</head>
<body>
    <section class="container">
        <form action="/Manao-test-task/scripts/logout.php" class="container__greeting">
            <p><?php echo "Hello ".$_SESSION['name']."!"; ?></p>
            <button type="submit">Exit</button>
        </form>
    </section>
</body>
</html>
