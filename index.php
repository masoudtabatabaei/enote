<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 2020-09-09
 * Time: 3:37 PM
 */

require_once "main.php";

$db = Db::getInstance();
$sql = "SELECT * from users";
$userList = $db->query($sql);

echo "<pre>";
print_r($userList);
print_r($db->first($sql));
echo "</pre>";
