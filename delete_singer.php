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
 echo 'Connected successfully'.'<br>';

$delete_fname = $_POST['delete_fname'];
$delete_minit = $_POST['delete_minit'];
$delete_lname = $_POST['delete_lname'];
echo 'The singer that you want to delete is: '.$delete_fname.' '.$delete_minit.' '.$delete_lname.'<br />';
$delete_sID = $_POST['delete_sID'];
echo 'The ID of this singer is: '.$delete_sID.'<br />';


// find the singer by ID
$result = mysqli_query($link, "SELECT S_id, Fname, Minit, Lname FROM singer WHERE S_id='$delete_sID'");

while ($row = mysqli_fetch_array($result)) {
	//echo $row['S_id'].'<br>';
	if ($delete_sID == $row['S_id'] && $delete_fname == $row['Fname'] && $delete_minit == $row['Minit'] && $delete_lname == $row['Lname']) {
		echo 'Found the music that you want to delete.'.'<br />';
		
		// delete the singer
		$delete_fname = mysqli_real_escape_string($link, $_POST['delete_fname']);
		$delete_minit = mysqli_real_escape_string($link, $_POST['delete_minit']);
		$delete_lname = mysqli_real_escape_string($link, $_POST['delete_lname']);		
		$delete_sID = mysqli_real_escape_string($link, $_POST['delete_sID']);

		mysqli_query($link, "DELETE FROM singer WHERE S_id='$delete_sID'");

		echo $delete_fname.$delete_minit.$delete_lname.' has been deleted.'.'<br />';
		
		$_SESSION['message'] = 'Singer deleted.';
?>
<form action="delete_singer.html" method="post">
<input type="submit" value="Return to Delete Singer">
</form>	
<form action="admin_dashboard.php" method="post">
<input type="submit" value="Return to dashboard">
</form>	

<?php		
		//return $delete_name;
	}else {
		echo 'Oops! Can not find the singer. Please try again.'.'<br />';
		$_SESSION['message'] = 'Singer deletion failed.';
		
?>

<form action="delete_singer.html" method="post">
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
