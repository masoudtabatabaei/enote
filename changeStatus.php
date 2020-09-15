<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 2020-09-14
 * Time: 4:41 PM
 */

require_once "main.php";

$note_id = $_GET["id"];
$note_status = $_GET["status"];

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

$db = Db::getInstance();
$status = ($note_status == "Pending") ? "Done" : "Pending" ;

$update = $db->modify("UPDATE notes SET status = '{$status}' WHERE id = {$note_id} and user_id = {$_SESSION['user_id']}");

header("Location: home.php");