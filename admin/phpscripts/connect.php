<?php
    $user = "root";
	$pass = "";
	$url = "localhost";
    $db = "db_movies";
    
    $link = mysqli_connect($url, $user, $pass, $db);

    if(mysqli_connect_errno()) {
        printf("Connection error", mysqli_connect_error());
        exit();
    }

?>