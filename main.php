<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 2020-09-12
 * Time: 3:28 PM
 */

session_start();

date_default_timezone_set("Asia/Tehran");
global $config;
require_once "config.php";
require_once "locale-" . $config["lang"] . ".php";
require_once "Db/Db.php";