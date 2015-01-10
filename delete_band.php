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
echo 'The band that you want to delete is: '.$delete_name.'<br />';
$delete_bID = $_POST['delete_bID'];
echo 'The ID of this band is: '.$delete_bID.'<br />';


// find the band by ID
$result = mysqli_query($link, "SELECT B_id, B_Name FROM band WHERE B_id='$delete_bID'");

while ($row = mysqli_fetch_array($result)) {
	//echo $row['B_id'].'<br>';
	if ($delete_bID == $row['B_id'] && $delete_name == $row['B_Name']) {
		echo 'Found the band that you want to delete.'.'<br />';
		
		// delete the band
		$delete_name = mysqli_real_escape_string($link, $_POST['delete_name']);
		$delete_bID = mysqli_real_escape_string($link, $_POST['delete_bID']);

		mysqli_query($link, "DELETE FROM band WHERE B_id='$delete_bID'");

		echo $delete_name.' has been deleted.'.'<br />';
		
		$_SESSION['message'] = 'Band deleted.';
?>
<form action="delete_band.html" method="post">
<input type="submit" value="Return to Delete Band">
</form>	
<form action="admin_dashboard.php" method="post">
<input type="submit" value="Return to dashboard">
</form>	

<?php		
		//return $delete_name;
	}else {
		echo 'Oops! Can not find the band. Please try again.'.'<br />';
		$_SESSION['message'] = 'Band deletion failed.';
		
?>

<form action="delete_band.html" method="post">
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
