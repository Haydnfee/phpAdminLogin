<?php
	ini_set('display_errors',1);
	error_reporting(E_ALL);

	require_once('phpscripts/config.php');

	$ip = $_SERVER['REMOTE_ADDR'];
	if(isset($_POST['submit'])) {
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		if($username !== "" && $password !== "") {
			$result = logIn($username, $password, $ip);
			$message = $result;
		}else{
			$message = "Please fill in all required fields";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Custom Login Portal</title>
    <link href="../css/main.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
    <h1>Welcome to your login portal</h1>

    <?php
        date_default_timezone_set('America/Toronto');

        $hour = date('H');

        if ( $hour >= 23 && $hour <= 5) {
            echo "Still Awake?";
        } else if ( $hour >= 6 && $hour <= 11 ) {
            echo "Go Get Your Coffee First.";
        } else if ( $hour >= 12 && $hour <= 17 ) {
            echo "Is it Quittin' Time Yet?";
        } else if ( $hour >= 18 || $hour <= 22 ) {
            echo "Still At It, Huh?";
        }
    ?>

    <form action="admin_login.php" method="post">
        <lable>Username:</label>
        <input type="text" name="username" value="">
        <br>
        <lable>Password:</label>
        <input type="text" name="password" value="">
        <br>
        <input type="submit" name="submit" value="User Login">
    </form>
</body>
</html>