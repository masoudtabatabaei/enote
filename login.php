<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 2020-09-10
 * Time: 4:29 PM
 */

require_once "main.php";

if (isset($_SESSION['email'])) {
    $message = _already_logged_in;
    require_once "msg-success.php";
    exit();
}

?>

<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--    <link rel="stylesheet" href="css/materialize.min.css">-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <div class="container center-align">
            <div class="page-icon mar2">
                <img src="img/notes.png">
            </div>
            <p class="form-title pad-tb-1 font11"><?php echo _login_form; ?></p>
            <form class="main-form" method="post" action="login-check.php">
                <div class="left-align">
                    <input type="email" name="email" placeholder="<?php echo _ph_email; ?>" required>
                </div>
                <div class="left-align">
                    <input type="password" name="password" placeholder="<?php echo _ph_password; ?>" required>
                </div>
                <input type="submit" class="btn btn-info" value="<?php echo _login_link; ?>">
            </form>
            <br>
            <a class="center-align font8" href="register.php"><?php echo _create_account; ?></a>
        </div>
    </div>
</body>
</html>
