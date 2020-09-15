<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 2020-09-15
 * Time: 10:02 AM
 */

require_once "main.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

$db = Db::getInstance();

$note_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$note = $db->first("SELECT * FROM notes WHERE id = {$note_id} AND user_id = {$user_id}");

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
<div class="form-container">
    <div class="container center-align">
        <div class="page-icon mar2">
            <img src="img/paper.png">
        </div>
        <p class="form-title pad-tb-1 font11"><?php echo _note_edit_form; ?></p>
        <form class="main-form" method="post" action="update.php">
            <input type="hidden" name="note_id" value="<?php echo $note_id; ?>">
            <div class="left-align">
                <input type="text" name="note_title" placeholder="<?php echo _note_title; ?>" required value="<?php echo $note['title']; ?>">
            </div>
            <div class="left-align">
                <textarea name="note_description" placeholder="<?php echo _note_description; ?>" rows="4" required><?php echo $note['description']; ?></textarea>
            </div>
            <input type="submit" class="btn btn-info" value="<?php echo _note_edit_btn; ?>">
        </form>
    </div>
</div>
</body>
</html>
