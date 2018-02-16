<?php

require_once('phpscripts/config.php');
//confirm_logged_in(); //UNCOMMENT LINE IN LIVE VER
if(isset($_POST['submit'])) {
	$fname = trim($_POST['fname']);
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	$email = trim($_POST['email']);
	$userlvl = $_POST['userlvl'];
	if(empty($userlvl)){
		$message = "Please select a user level.";
	}else{
		$result = createUser($fname, $username, $password, $email, $userlvl);
		$message = $result;
	}
}

?>