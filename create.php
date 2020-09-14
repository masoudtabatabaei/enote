<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 2020-09-14
 * Time: 5:51 PM
 */

require_once "main.php";

$note_title = $_POST['note_title'];
$note_description = $_POST['note_description'];

$db = Db::getInstance();

if (!isset($_SESSION['user_id'])) {
    header("Location: home.php");
}

$now = date("Y-m-d H:i:s");
$user_id = $_SESSION['user_id'];


$insert_note = $db->insert("INSERT INTO notes (user_id , title , description , status , created_at , updated_at ) VALUES 
                                                  ($user_id , '$note_title' , '$note_description' , 'Pending' , '$now' , '$now')");


header("Location: home.php");