<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 2020-09-15
 * Time: 10:20 AM
 */

require_once "main.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

$user_id = $_SESSION['user_id'];

$db = Db::getInstance();

$update = $db->modify("UPDATE notes SET title = '{$_POST['note_title']}',description = '{$_POST['note_description']}' WHERE id = {$_POST['note_id']} AND user_id = {$user_id}");

header("Location: home.php");