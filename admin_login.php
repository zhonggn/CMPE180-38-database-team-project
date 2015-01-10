<?php session_start(); ?>

<!DOCTYPE html>
<html>
<body>
<fieldset>

<?php

// create connection
$link=mysqli_connect("localhost","root",'root',"musicwebsite");

// Check connection
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
// echo 'Connected successfully'.'<br>';


$A_name = $_POST['A_name'];
// echo $admin_name.'<br>';
$A_password = $_POST['A_password'];
// echo $password.'<br>';

$result = mysqli_query($link, "SELECT A_id, A_name, A_password FROM administrator WHERE A_name='$A_name'");

while ($row = mysqli_fetch_array($result)) {
	//echo $row['A_password'].'<br>';
	if ($A_password == $row['A_password']) {
		echo 'login successfully!'.'<br />';
		
		$_SESSION['A_name'] = $A_name;
		$_SESSION['A_id'] = $row['A_id'];
		//$_SESSION['password'] = $row['A_password'];
		
		// session_unset();
		echo 'Welcome back '.$A_name. '! Go to <a href="admin_dashboard.php">Administrator Dashboard</a><br>';
		exit;	
	}else {
		//echo 'wrong A_password! Please try again.';
	}
}

mysql_close($link);
?>

Wrong name or A_password, please login again.
<form action="admin_login.html" method="post">
<input type="submit" value="Try again">
</form>		

</fieldset>
</body>
</html>		
