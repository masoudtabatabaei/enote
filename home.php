<?php
/**
 * Created by PhpStorm.
 * User: Masoud
 * Date: 2020-09-13
 * Time: 10:16 AM
 */

require_once "main.php";

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$db = Db::getInstance();
$notes = $db->query("SELECT * FROM notes WHERE user_id = {$_SESSION['user_id']}");
?>

<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--    <link rel="stylesheet" href="css/materialize.min.css">-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css?<?php echo time()?>">
</head>
<body>
<div class="header">
    <div class="item profile"><?php echo $_SESSION['email']; ?></div>
    <div class="item"><a class="btn btn-exit" href="logout.php"><?php echo _logout_link; ?></a></div>
</div>
<div class="wrapper">
    <a href="note_form.php" class="btn btn-info"><?php echo _create_new_note; ?></a>
    <br>
    <table>
        <tr>
            <th><?php echo _ID ;?></th>
            <th><?php echo _title ;?></th>
            <th><?php echo _description ;?></th>
            <th><?php echo _creation_time ;?></th>
            <th><?php echo _actions ;?></th>
        </tr>
        <?php foreach ($notes as $note) {
            if ($note['status'] == "Done") { ?>
                <tr style="background-color: #02e949;">
            <?php } else { ?>
                <tr>
            <?php } ?>
                <td><?php echo $note['id']; ?></td>
                <td><?php echo $note['title']; ?></td>
                <td style="width: 40%"><?php echo $note['description']; ?></td>
                <td style="direction: ltr;"><?php echo $note['created_at']; ?></td>
                <td class="actions-container-btn">
                    <div>
                        <a href="changeStatus.php?id=<?php echo $note['id']; ?>&status=<?php echo $note['status']; ?>" class="tooltip actions-btn">
                            <span class="tooltiptext">Toggle status</span>
                            <img src="img/change.png">
                        </a>
                        <a href="edit-form.php?id=<?php echo $note['id']; ?>" class="tooltip actions-btn">
                            <span class="tooltiptext">Edit</span>
                            <img src="img/edit.png">
                        </a>
                        <a href="delete.php?id=<?php echo $note['id']; ?>" class="tooltip actions-btn">
                            <span class="tooltiptext">Remove</span>
                            <img src="img/recycle-bin.png">
                        </a>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>

