<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 2020-09-11
 * Time: 12:52 PM
 */

require_once "main.php";

$email = $_POST['email'];
$password = md5($_POST['password']);

$db = Db::getInstance();

$find_user = $db->first("SELECT * FROM users WHERE email ='$email' and password='$password'");

if ($find_user) {
    $_SESSION['email'] = $email;
    $message = "You Login successfully.";
    require_once "msg-success.php";
    exit();
} else {
    $message = "Sorry! email or password was wrong!<br><a href='login.php' class='underline'>Login</a>";
    require_once "msg-failure.php";
    exit();
}