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
echo 'The music that you want to delete is: '.$delete_name.'<br />';
$delete_mID = $_POST['delete_mID'];
echo 'The ID of this music is: '.$delete_mID.'<br />';


// find the music by ID
$result = mysqli_query($link, "SELECT m_Id, m_name FROM music WHERE m_Id='$delete_mID'");

while ($row = mysqli_fetch_array($result)) {
	//echo $row['m_Id'].'<br>';
	if ($delete_mID == $row['m_Id'] && $delete_name == $row['m_name']) {
		echo 'Found the music that you want to delete.'.'<br />';
		
		// delete the music
		$delete_name = mysqli_real_escape_string($link, $_POST['delete_name']);
		$delete_mID = mysqli_real_escape_string($link, $_POST['delete_mID']);

		mysqli_query($link, "DELETE FROM music WHERE m_Id='$delete_mID'");

		echo $delete_name.' has been deleted.'.'<br />';
		
		$_SESSION['message'] = 'Music deleted.';
?>
<form action="delete_music.html" method="post">
<input type="submit" value="Return to Delete Music">
</form>	
<form action="admin_dashboard.php" method="post">
<input type="submit" value="Return to dashboard">
</form>	

<?php		
		//return $delete_name;
	}else {
		echo 'Oops! Can not find the music. Please try again.'.'<br />';
		$_SESSION['message'] = 'Music deletion failed.';
		
?>

<form action="delete_music.html" method="post">
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
