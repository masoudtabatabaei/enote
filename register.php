<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 2020-09-12
 * Time: 3:21 PM
 */

require_once "main.php";
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
        <p class="form-title pad-tb-1 font11"><?php echo _register_form; ?></p>
        <form class="main-form" method="post" action="register-check.php">
            <div class="left-align">
                <input type="text" name="fullName" placeholder="<?php echo _ph_fullName; ?>" required>
            </div>
            <div class="left-align">
                <input type="email" name="email" placeholder="<?php echo _ph_email; ?>" required>
            </div>
            <div class="left-align">
                <input type="password" name="password" placeholder="<?php echo _ph_password; ?>" required>
            </div>
            <div class="left-align">
                <input type="password" name="rePassword" placeholder="<?php echo _ph_repeat_password; ?>" required>
            </div>
            <input type="submit" class="btn btn-info" value="<?php echo _create_account; ?>">
        </form>
        <br>
        <a class="center-align font8" href="login.php"><?php echo _login_link; ?></a>
    </div>
</div>
</body>
</html>

