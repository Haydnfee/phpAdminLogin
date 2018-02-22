<?php

require_once('phpscripts/config.php');
confirm_logged_in(); //UNCOMMENT LINE IN LIVE VER
if(isset($_POST['submit'])) {

	$fname = trim($_POST['fname']);
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	$email = trim($_POST['email']);
    $userlvl = $_POST['userlvl'];
    
	if(empty($userlvl)){
		$message = "Select a user level to continue.";
	}else{
		$result = createUser($fname, $username, $password, $email, $userlvl);
		$message = $result;
	}	
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>User Creation</title>
<link href="../css/main.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
    <h1>Create an additional user.</h1>
    <?php if(!empty($message)){echo $message;}?>
    <form id="createForm" action="admin_createUser.php" method="post">
		<lable>First Name:</lable>
		<input type="text" name="fname" value="<?php if(!empty($fname)){echo $fname;} ?>"><br><br>
		<lable>Username:</lable>
		<input type="text" name="username" value="<?php if(!empty($username)){echo $username;} ?>"><br><br>
		<lable>Password:</lable>
		<input type="text" name="password" value="<?php if(!empty($password)){echo $password;} ?>"><br><br>
		<lable>Email:</lable>
		<input type="text" name="email" value="<?php if(!empty($email)){echo $email;} ?>"><br><br>
		<lable>User Level:</lable>
		<select name="userlvl">
			<option value="">Please select a user level
			</option>
            <option value="3">General User
			</option>
			<option value="2">Web Admin
			</option>
			<option value="1">Web Master
			</option>
		</select><br><br>
		<input id="submit" type="submit" name="submit" value="Create User">
    </form>
    
</body>
</html>