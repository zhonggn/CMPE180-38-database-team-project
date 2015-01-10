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

$add_name = $_POST['add_name'];
echo 'Name of the user is: '.$add_name.'<br />';
$add_password = $_POST['add_password'];
echo 'The password is: '.$add_password.'<br />';
$add_email = $_POST['add_email'];
echo 'Email of this user is: '.$add_email.'<br />';
$add_date = $_POST['add_date'];
echo 'Registe date is: '.$add_date.'<br />';
$add_balance = $_POST['add_balance'];
echo 'Account balance of this user is: '.$add_balance.'<br />';

$add_name = mysqli_real_escape_string($link,$_POST['add_name']);
$add_password = mysqli_real_escape_string($link,$_POST['add_password']);
$add_email = mysqli_real_escape_string($link,$_POST['add_email']);
$add_date = mysqli_real_escape_string($link,$_POST['add_date']);
$add_balance = mysqli_real_escape_string($link,$_POST['add_balance']);

//insert into user table
$sql = "INSERT INTO user (U_name,U_password,email,Regist_date,Account_balance)
VALUES ('$add_name','$add_password','$add_email','$add_date','$add_balance')";

if (!mysqli_query($link,$sql)) {
	die('Error: '.myquli_error($link));
}
$newUserID = mysqli_insert_id($link);
echo '1 user added. New user has ID: '. $newUserID.'<br />';

//insert into administer table
if (isset($_SESSION['admin_id'])) {
	//echo 'Administrator has ID: '.$_SESSION['admin_id'].'<br />';
	$A_id = $_SESSION['admin_id'];
	
	$sql1 = "INSERT INTO administer (A_id, U_id)
	VALUES ('$A_id','$newUserID')";

	if (!mysqli_query($link,$sql1)) {
		die('Error: '.myquli_error($link));
	}
}

mysql_close($link);
?>
<form action="admin_dashboard.php" method="post">
<input type="submit" value="return to dashboard">
</form>		

</fieldset>
</body>
</html>		
