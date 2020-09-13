<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 2020-09-13
 * Time: 10:16 AM
 */

require_once "main.php";

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
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
<div class="header">
    <div class="item profile"><?php echo $_SESSION['email']; ?></div>
    <div class="item"><a href="logout.php"><?php echo _logout_link; ?></a></div>
</div>
</body>
</html>

