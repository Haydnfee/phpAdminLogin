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
			

			redirect_to("admin_index.php");
		}else{
			$message = "username or password is incorrect. <br>Please make sure your cap locks key is turned off.";
			return $message;
		}
			echo $id;


		mysqli_close($link);
	}

?>