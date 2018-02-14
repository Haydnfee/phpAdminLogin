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
        <?php echo "<h2>Welcome {$_SESSION['user_name']}</h2>
        <h3>Your last login date was: {$_SESSION['lastLogin']}</h3>" //display last login message
        ?>
</body>
</html>