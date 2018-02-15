<?php

require_once('phpscripts/config.php');
confirm_logged_in();

?>

<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Home Page</title>
</head>
<body>
    <h1>Welcome to your admin page</h1>
        <?php 
        
        echo "<h2>Welcome {$_SESSION['user_name']}</h2>";
        
        $date = date("d-m-y")." at ".date("h:i:sa");

        $updatedate = "UPDATE tbl_user 
        SET user_lastLogin = '$date'
        WHERE user_id={$_SESSION['user_id']}";

        $updatequery = mysqli_query($link, $updatestring); //$link undefined-cant update db
        
        ?>
</body>
</html>