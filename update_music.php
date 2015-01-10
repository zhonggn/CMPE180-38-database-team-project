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
//echo 'Connected successfully'.'<br>';

$original_name = $_POST['original_name'];
echo 'Original name of the music is: '.$original_name.'<br />';
$update_name = $_POST['update_name'];
echo 'The name of music you want to update is: '.$update_name.'<br />';
$update_year = $_POST['update_year'];
echo 'The release year is: '.$update_year.'<br />';
$update_duration = $_POST['update_duration'];
echo 'The duration of this music is: '.$update_duration.'<br />';
$update_price = $_POST['update_price'];
echo 'The price of this music is: '.$update_price.'<br />';
$available_status = $_POST['available_status'];
echo 'The available status is: '.$available_status.'<br />';

$original_name = mysqli_real_escape_string($link,$_POST['original_name']);
$update_year = mysqli_real_escape_string($link,$_POST['update_year']);
$update_duration = mysqli_real_escape_string($link,$_POST['update_duration']);
$update_price = mysqli_real_escape_string($link,$_POST['update_price']);
$available_status = mysqli_real_escape_string($link,$_POST['available_status']);

$result = mysqli_query($link, "SELECT m_Id FROM music WHERE m_name='$original_name'");
while ($row = mysqli_fetch_array($result)) {
	echo 'This music has ID: '.$row['m_Id'].'<br>';
	$originalID = $row['m_Id'];
	//echo $originalID;
}
?>
<hr>
<?php

//update music name
if ($update_name != NULL) {
	$sql = "UPDATE music SET m_name='$update_name' 
	WHERE m_Id='$originalID'";
	
	if (!mysqli_query($link,$sql)) {
		die('Error: '. mysqli_error($link));
	}
	echo 'The original name: '.$original_name.'  has been updated to: '.$update_name.'<br />';
}

//update released year
if ($update_year != NULL) {
	$sql1 = "UPDATE music SET release_year='$update_year' 
	WHERE m_Id='$originalID'";
	
	if (!mysqli_query($link,$sql1)) {
		die('Error: '. mysqli_error($link));
	}
	echo 'The year of the music has been updated to: '.$update_year.'<br />';
}

//update price
if ($update_price != NULL) {
	$sql2 = "UPDATE music SET price='$update_price' 
	WHERE m_Id='$originalID'";
	
	if (!mysqli_query($link,$sql2)) {
		die('Error: '. mysqli_error($link));
	}
	echo 'The price of the music has been updated to: '.$update_price.'<br />';
}

//update duration
if ($update_duration != NULL) {
	$sql3 = "UPDATE music SET duration='$update_duration' 
	WHERE m_Id='$originalID'";
	
	if (!mysqli_query($link,$sql3)) {
		die('Error: '. mysqli_error($link));
	}
	echo 'The duration of the music has been updated to: '.$update_duration.'<br />';
}

//update available status
if ($available_status != NULL) {
	$sql4 = "UPDATE music SET available_status='$available_status' 
	WHERE m_Id='$originalID'";
	
	if (!mysqli_query($link,$sql4)) {
		die('Error: '. mysqli_error($link));
	}
	echo 'The available status of the music has been updated to: '.$available_status.'<br />';
}


mysql_close($link);
?>
<form action="update_music.html" method="post">
<input type="submit" value="return to update music">
</form>
<form action="admin_dashboard.php" method="post">
<input type="submit" value="return to dashboard">
</form>		

</fieldset>
</body>
</html>		
