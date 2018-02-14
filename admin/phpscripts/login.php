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
			if(mysqli_query($link, $loginstring)) {
				$updatestring = "UPDATE tbl_user SET user_ip = '$ip' WHERE user_id={$id}";
				$updatequery = mysqli_query($link, $updatestring);

				$query = "UPDATE tbl_user SET lastLogin = NOW()";
				$query ="WHERE id = {$_SESSION['user_id']} LIMIT 1";
				$result_set = mysqli_query($link, $query);

				if (!$result_set) {
					die("Failed to connect to database");
				}
			
			redirect_to("admin_index.php");

			// session_start(); 
			// $update = ('UPDATE tbl_users SET lastLogin = now() WHERE "name" = "{$_POST["name"]}"');	//updates database with current login time

		}else{
			$message = "The username or password is incorrect.";
			return $message;
		}
			echo $id;


		mysqli_close($link);
	}

?>