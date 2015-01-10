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

$delete_name = $_POST['delete_name'];
echo 'The user that you want to delete is: '.$delete_name.'<br />';
$delete_uID = $_POST['delete_uID'];
echo 'The ID of this user is: '.$delete_uID.'<br />';

// find the user by ID
$result = mysqli_query($link, "SELECT U_id, U_name FROM user WHERE U_id='$delete_uID'");

while ($row = mysqli_fetch_array($result)) {
	//echo $row['U_id'].'<br>';
	if ($delete_uID == $row['U_id'] && $delete_name == $row['U_name']) {
		echo 'Found the user that you want to delete.'.'<br />';
		
		// delete the user
		$delete_name = mysqli_real_escape_string($link, $_POST['delete_name']);
		$delete_uID = mysqli_real_escape_string($link, $_POST['delete_uID']);

		mysqli_query($link, "DELETE FROM user WHERE U_id='$delete_uID'");
		
		echo $delete_name.' has been deleted.'.'<br />';
		
		$_SESSION['message'] = 'User deleted.';
?>
<form action="delete_user.html" method="post">
<input type="submit" value="Return to Delete User">
</form>	
<form action="admin_dashboard.php" method="post">
<input type="submit" value="Return to dashboard">
</form>	

<?php		
		//return $delete_name;
	}else {
		echo 'Oops! Can not find the user. Please try again.'.'<br />';
		$_SESSION['message'] = 'User deletion failed.';
		
?>

<form action="delete_user.html" method="post">
<input type="submit" value="Try again">
</form>	

<?php
		
	}
}


mysql_close($link);
?>


</fieldset>
</body>
</html>	