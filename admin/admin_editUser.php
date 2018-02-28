<?php

require_once('phpscripts/config.php');
confirm_logged_in();
$id = $_SESSION['user_id'];

$tbl = "tbl_user";
$col = "user_id";
$popForm = getSingle($tbl, $col, $id);
$found_user = mysqli_fetch_array($popForm, MYSQLI_ASSOC);

if(isset($_POST['submit'])) {
    $fname = trim($_POST['fname']);
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
    $email = trim($_POST['email']);
    
		$result = editUser($id, $fname, $username, $password, $email);
		$message = $result;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CMS Edit User</title>
</head>
<body>
    <h1>Edit an Existing User</h1>
    <?php if(!empty($message)){echo $message;} ?>
		<form action="admin_editUser.php" method="post">
		<lable>First Name:</lable>
		<input type="text" name="fname" value="<?php echo $found_user['user_fname']; ?>"><br><br>
		<lable>Username:</lable>
		<input type="text" name="username" value="<?php echo $found_user['user_name']; ?>"><br><br>
		<lable>Password:</lable>
		<input type="text" name="password" value="<?php echo $found_user['user_pass']; ?>"><br><br>
		<lable>Email:</lable>
		<input type="text" name="email" value="<?php echo $found_user['user_email']; ?>"><br><br>
		<input type="submit" name="submit" value="Edit User">		

	</form>
    
</body>
</html>