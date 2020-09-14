<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 2020-09-14
 * Time: 5:45 PM
 */

require_once "main.php";

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
            <img src="img/notes.png">
        </div>
        <p class="form-title pad-tb-1 font11"><?php echo _new_note_form; ?></p>
        <form class="main-form" method="post" action="create.php">
            <div class="left-align">
                <input type="text" name="note_title" placeholder="<?php echo _note_title; ?>" required>
            </div>
            <div class="left-align">
                <textarea name="note_description" placeholder="<?php echo _note_description; ?>" rows="4" required></textarea>
            </div>
            <input type="submit" class="btn btn-info" value="<?php echo _note_insert_btn; ?>">
        </form>
    </div>
</div>
</body>
</html>
