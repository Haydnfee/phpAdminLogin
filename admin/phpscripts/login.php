<?php

	function Login($username, $password, $ip) {
		require_once('connect.php');
		$username = mysqli_real_escape_string($link, $username);
		$password = mysqli_real_escape_string($link, $password);
		$loginstring = "SELECT * FROM tbl_user WHERE user_name = '{$username}' AND user_pass = '{$password}'";
		//echo $loginstring;
		$user_set = mysqli_query($link, $loginstring);
			
			$found_user = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
			$id = $found_user['user_id'];
			$_SESSION['user_id'] = $id;
			$_SESSION['user_name'] = $found_user['user_fname'];
			$firstLoginString = "SELECT loginCount FROM tbl_user WHERE user_id='{$id}'";
			$firstLogQuery = mysqli_query($link, $firstLoginString);
			$found_userArray = mysqli_fetch_array($firstLogQuery, MYSQLI_ASSOC);
			$firstLog = $found_userArray['loginCount'];

			if(mysqli_query($link, $loginstring) && ($firstLog == 2)) {
				$updatestring = "UPDATE tbl_user SET user_ip = '$ip' WHERE user_id='{$id}'";
				$updatestring = "UPDATE tbl_user SET loginCount = 1 WHERE user_id='{$id}'"; //sets loginCount to 1 after first login
				$updatequery = mysqli_query($link, $updatestring);
				redirect_to("admin_editUser.php");

			}elseif(mysqli_query($link, $loginstring) && ($firstLog == 1)) { 
				$updatestring = "UPDATE tbl_user SET user_ip = '$ip' WHERE user_id='{$id}'";
				$updatequery = mysqli_query($link, $updatestring);
				redirect_to("admin_index.php"); //points to index when loginCount = 1

			}else{
				$message = "The username or password is incorrect.";
				return $message;
		}
			echo $id;


		mysqli_close($link);
	}

?>