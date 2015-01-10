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
echo 'The group that you want to delete is: '.$delete_name.'<br />';
$delete_gID = $_POST['delete_gID'];
echo 'The ID of this group is: '.$delete_gID.'<br />';

// find the group by ID
$result = mysqli_query($link, "SELECT G_id, G_Name FROM musicwebsite.group WHERE G_id='$delete_gID'");

while ($row = mysqli_fetch_array($result)) {
	//echo $row['G_id'].'<br>';
	if ($delete_gID == $row['G_id'] && $delete_name == $row['G_Name']) {
		echo 'Found the group that you want to delete.'.'<br />';
		
		// delete the group
		$delete_name = mysqli_real_escape_string($link, $_POST['delete_name']);
		$delete_gID = mysqli_real_escape_string($link, $_POST['delete_gID']);

		mysqli_query($link, "DELETE FROM musicwebsite.group WHERE G_id='$delete_gID'");

		echo $delete_name.' has been deleted.'.'<br />';
		
		$_SESSION['message'] = 'Group deleted.';
?>
<form action="delete_group.html" method="post">
<input type="submit" value="Return to Delete Group">
</form>	
<form action="admin_dashboard.php" method="post">
<input type="submit" value="Return to dashboard">
</form>	

<?php		
		//return $delete_name;
	}else {
		echo 'Oops! Can not find the group. Please try again.'.'<br />';
		$_SESSION['message'] = 'Group deletion failed.';
		
?>

<form action="delete_group.html" method="post">
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
