<?php

    require_once('phpscripts/config.php');
    $tbl = "tbl_user";
    $users = getAll($tbl);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CMS Delete User</title>
</head>
<body>
    <h1>Delete User Here</h1>
    <?php
        while ($row = mysqli_fetch_array($users)) {
        echo "{$row['user_fname']}<a href=\"phpscripts/caller.php?caller_id=delete&id={$row['user_id']}\">Delete User</a><br>";
        }
    ?>
    
</body>
</html>