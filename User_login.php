<?php session_start(); ?>

<!DOCTYPE html>
<html>
<body>
<fieldset>
<legend>Login Successfully</legend>
<?php

// create connection
$link=mysqli_connect("localhost","root",'root',"musicwebsite");

// Check connection
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
// echo 'Connected successfully'.'<br>';


$user_name = $_POST['user_name'];

$password = $_POST['password'];

$result = mysqli_query($link, "SELECT U_id, U_name, U_password FROM user WHERE U_name='".$user_name."'");

while ($row = mysqli_fetch_array($result)) {
	//echo $row['U_password'].'<br>';
	if ($password == $row['U_password']) {
		echo 'login successfully!'.'<br />';
		
		$_SESSION['user_name'] = $user_name;
		$_SESSION['U_id'] = $row['U_id'];
		echo 'Welcome back '.$user_name. '! Go to <a href="RegisteredUser.php">user Dashboard</a><br>';
		exit;	
	}else {
		//echo 'wrong password! Please try again.';
	}
}

mysql_close($link);
?>

Wrong name or password, please login again.
<form action="User_login.html" method="post">
<input type="submit" value="Try again">
</form>		

</fieldset>
</body>
</html>		
