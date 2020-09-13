<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 2020-09-13
 * Time: 10:03 AM
 */

require_once "main.php";
session_destroy();

header("Location: login.php");

