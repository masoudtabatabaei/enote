<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 2020-09-12
 * Time: 3:25 PM
 */

require_once "main.php";

$fullName = filter_var($_POST["fullName"] , FILTER_SANITIZE_STRING);
$email = filter_var($_POST["email"] , FILTER_SANITIZE_EMAIL);

$password = filter_var($_POST["password"] , FILTER_SANITIZE_STRING);
$rePassword = filter_var($_POST["rePassword"] , FILTER_SANITIZE_STRING);

if (strlen($password) < 8 || strlen($rePassword) < 8) {
    $message = _check_password_count_char ;
    require_once "msg-failure.php";
    exit();
}

$password = md5($password);
$rePassword = md5($rePassword);
$db = Db::getInstance();

if ($password == $rePassword) {
    $already_user = $db->first("SELECT * FROM users WHERE email = '$email'");

    if ($already_user) {
        $message = _already_registered;
        require_once "msg-failure.php";
        exit();
    }

    try {
        $now = date("Y-m-d H:i:s");
        $insert_user= $db->insert("INSERT INTO users (full_name , email , password , created_at) VALUES ('$fullName','$email','$password','$now')");
        $message = _successfully_register;
        require_once "msg-success.php";
        exit();
    } catch (\Exception $exception) {
        $message = _register_error;
        require_once "msg-failure.php";
        exit();
    }
} else {
    $message = _not_match_passwords;
    require_once "msg-failure.php";
    exit();
}