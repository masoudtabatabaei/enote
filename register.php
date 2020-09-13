<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 2020-09-12
 * Time: 3:21 PM
 */
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
        <p class="form-title pad-tb-1 font11">Register Form</p>
        <form class="main-form" method="post" action="register-check.php">
            <div class="left-align">
                <input type="text" name="fullName" placeholder="Full Name" required>
            </div>
            <div class="left-align">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="left-align">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="left-align">
                <input type="password" name="rePassword" placeholder="Repeat Password" required>
            </div>
            <input type="submit" class="btn btn-info" value="Register">
        </form>
        <br>
        <a class="underline center-align font8" href="login.php">Login Account</a>
    </div>
</div>
</body>
</html>

