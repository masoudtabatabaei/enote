<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 2020-09-15
 * Time: 9:23 AM
 */

require_once "main.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

$user_id = $_SESSION['user_id'];
$note_id = $_GET['id'];

$db = Db::getInstance();

$delete_note = $db->modify("DELETE FROM notes WHERE id = {$note_id} and user_id = {$user_id}");

header("Location: home.php");