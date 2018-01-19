<?php 
require_once 'PasswordStorage.php';
$message = null;
if(isset($_POST['submit'])){
	$message = "Password invalid";
	$user_pwd 		= $_POST['userpwd'];
	$confirm_pwd 	= $_POST['confirmpwd'];
	
	if(!empty($user_pwd) && !empty($confirm_pwd)) {
		$hash = PasswordStorage::create_hash($user_pwd);
		$status = PasswordStorage::verify_password($confirm_pwd, $hash);
		if($status) {
			$message = "Password valid";
		}
	} else {
		$message = "Empty Fields !!!";
	}
}
?>

<html>
<head>
	<title>Password Store</title>
	<style type="text/css">
	*{
		font-family: arial;
		font-size: 13px;
	}
</style>
</head>
<body>
	<form action="index.php" method="post">
		<p><?php echo $message ?></p>
		<table border="0">
			<tr>
				<td>Password:</td>
				<td><input type="password" name="userpwd"/></td>
			</tr>
			<tr>
				<td>Re-Password:</td>
				<td><input type="password" name="confirmpwd"/></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Sign Up"/></td>
			</tr>
		</table>
	</form>
</body>
</html>