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

$original_fname = $_POST['original_fname'];
$original_minit = $_POST['original_minit'];
$original_lname = $_POST['original_lname'];
echo 'The original name of singer is: '.$original_fname.' '.$original_minit.' '.$original_lname.'<br />';
$update_fname = $_POST['update_fname'];
$update_minit = $_POST['update_minit'];
$update_lname = $_POST['update_lname'];
echo 'The updated name of singer is: '.$update_fname.' '.$update_minit.' '.$update_lname.'<br />';
$update_gender = $_POST['update_gender'];
echo 'Gender: '.$update_gender.'<br />';
$update_company = $_POST['update_company'];
echo 'Belonging company is: '.$update_company.'<br />';
$update_nationality = $_POST['update_nationality'];
echo 'Nationality is: '.$update_nationality.'<br />';
$original_band = $_POST['original_band'];
echo 'The original belonging band is: '.$original_band.'<br />';
$update_band = $_POST['update_band'];
echo 'The updated belonging band is: '.$update_band.'<br />';
$original_group = $_POST['original_group'];
echo 'The original belonging group is: '.$original_group.'<br />';
$update_group = $_POST['update_group'];
echo 'The updated belonging group is: '.$update_group.'<br />';

$original_fname = mysqli_real_escape_string($link,$_POST['original_fname']);
$original_minit = mysqli_real_escape_string($link,$_POST['original_minit']);
$original_lname = mysqli_real_escape_string($link,$_POST['original_lname']);
$update_fname = mysqli_real_escape_string($link,$_POST['update_fname']);
$update_minit = mysqli_real_escape_string($link,$_POST['update_minit']);
$update_lname = mysqli_real_escape_string($link,$_POST['update_lname']);
$update_gender = mysqli_real_escape_string($link,$_POST['update_gender']);
$update_company = mysqli_real_escape_string($link,$_POST['update_company']);
$update_nationality = mysqli_real_escape_string($link,$_POST['update_nationality']);
$original_band = mysqli_real_escape_string($link,$_POST['original_band']);
$update_band = mysqli_real_escape_string($link,$_POST['update_band']);
$original_group = mysqli_real_escape_string($link,$_POST['original_group']);
$update_group = mysqli_real_escape_string($link,$_POST['update_group']);

$result = mysqli_query($link, "SELECT S_id FROM singer 
WHERE Fname='$original_fname' AND Minit='$original_minit' AND Lname='$original_lname'");
while ($row = mysqli_fetch_array($result)) {
	echo 'This singer has ID: '.$row['S_id'].'<br>';
	$originalID = $row['S_id'];
	//echo $originalID;
}

if ($original_band != NULL) {
	$result1 = mysqli_query($link, "SELECT B_id FROM band WHERE B_Name='$original_band'");
	while ($row1 = mysqli_fetch_array($result1)) {
		echo 'This band has ID: '.$row1['B_id'].'<br>';
		$originalBID = $row1['B_id'];
	//echo $originalID;
	}
}

if ($original_group != NULL) {
	$result2 = mysqli_query($link, "SELECT G_id FROM musicwebsite.group WHERE G_Name='$original_group'");
	while ($row2 = mysqli_fetch_array($result2)) {
		echo 'This group has ID: '.$row2['G_id'].'<br>';
		$originalGID = $row2['G_id'];
	//echo $originalID;
	}
}
?>
<hr>
<?php

//update first name
if ($update_fname != NULL) {
	$sql = "UPDATE singer SET Fname='$update_fname' 
	WHERE S_id='$originalID'";
	
	if (!mysqli_query($link,$sql)) {
		die('Error: '. mysqli_error($link));
	}
	echo 'The original first name: '.$original_fname.'  has been updated to: '.$update_fname.'<br />';
}

//update minit
if ($update_minit != NULL) {
	$sql1 = "UPDATE singer SET Minit='$update_minit' 
	WHERE S_id='$originalID'";
	
	if (!mysqli_query($link,$sql1)) {
		die('Error: '. mysqli_error($link));
	}
	echo 'The original middle name: '.$original_minit.'  has been updated to: '.$update_minit.'<br />';
}

//update last name
if ($update_lname != NULL) {
	$sql2 = "UPDATE singer SET Lname='$update_lname' 
	WHERE S_id='$originalID'";
	
	if (!mysqli_query($link,$sql2)) {
		die('Error: '. mysqli_error($link));
	}
	echo 'The original last name: '.$original_lname.'  has been updated to: '.$update_lname.'<br />';
}

//update gender
if ($update_gender != NULL) {
	$sql3 = "UPDATE singer SET Gender='$update_gender' 
	WHERE S_id='$originalID'";
	
	if (!mysqli_query($link,$sql3)) {
		die('Error: '. mysqli_error($link));
	}
	echo 'The gender of the singer has been updated to: '.$update_gender.'<br />';
}

//update belonging company
if ($update_company != NULL) {
	$sql4 = "UPDATE singer SET Belonging_Company='$update_company' 
	WHERE S_id='$originalID'";
	
	if (!mysqli_query($link,$sql4)) {
		die('Error: '. mysqli_error($link));
	}
	echo 'The belonging company of the singer has been updated to: '.$update_company.'<br />';
}

//update nationality
if ($update_nationality != NULL) {
	$sql5 = "UPDATE singer SET Nationality='$update_nationality' 
	WHERE S_id='$originalID'";
	
	if (!mysqli_query($link,$sql5)) {
		die('Error: '. mysqli_error($link));
	}
	echo 'The nationality of the singer has been updated to: '.$update_nationality.'<br />';
}

//update band name
if ($original_band != NULL && $update_band != NULL) {
	$sql6 = "UPDATE band SET B_Name='$update_band' 
	WHERE B_id='$originalBID'";
	//echo $originalBID;
	if (!mysqli_query($link,$sql6)) {
		die('Error: '. mysqli_error($link));
	}
	echo 'The belonging band of the singer has been updated to: '.$update_band.'<br />';
}else if ($original_band == NULL && $update_band != NULL) {
	$sql7 = "INSERT INTO band (B_Name, Company) VALUES ('$update_band', '$update_company')";

	if (!mysqli_query($link,$sql7)) {
		die('Error: '. mysqli_error($link));
	}
	$newBandID = mysqli_insert_id($link);
	echo 'The belonging band of this singer is: '.$update_band.'<br />';
	echo 'This is a new band. Band ID: '.$newBandID.'<br />';
	
	//update B_id back into singer table
	if ($newBandID != NULL) {
		$sql8 = "UPDATE singer SET B_id='$newBandID' 
		WHERE S_id='$originalID'";
	
		if (!mysqli_query($link,$sql8)) {
			die('Error: '. mysqli_error($link));
		}
	}
}

//update group name
if ($original_group != NULL && $update_group != NULL) {
	$sql9 = "UPDATE musicwebsite.group SET G_Name='$update_group' 
	WHERE G_id='$originalGID'";
	//echo $originalGID;
	if (!mysqli_query($link,$sql9)) {
		die('Error: '. mysqli_error($link));
	}
	echo 'The belonging group of the singer has been updated to: '.$update_group.'<br />';
}else if ($original_group == NULL && $update_group != NULL) {
	$sql10 = "INSERT INTO musicwebsite.group (G_Name, Company) VALUES ('$update_group', '$update_company')";

	if (!mysqli_query($link,$sql10)) {
		die('Error: '. mysqli_error($link));
	}
	$newGroupID = mysqli_insert_id($link);
	echo 'The belonging group of this singer is: '.$update_group.'<br />';
	echo 'This is a new group. Group ID: '.$newGroupID.'<br />';
	
	//update G_id back into singer table
	if ($newGroupID != NULL) {
		$sql11 = "UPDATE singer SET G_id='$newGroupID' 
		WHERE S_id='$originalID'";
	
		if (!mysqli_query($link,$sql11)) {
			die('Error: '. mysqli_error($link));
		}
	}
}


mysql_close($link);
?>
<form action="update_singer.html" method="post">
<input type="submit" value="return to update singer">
</form>
<form action="admin_dashboard.php" method="post">
<input type="submit" value="return to dashboard">
</form>		

</fieldset>
</body>
</html>	