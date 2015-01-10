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
 
$add_name = $_POST['add_name'];
echo 'The name of music you want to add is: '.$add_name.'<br />';
$add_fname = $_POST['add_fname'];
$add_minit = $_POST['add_minit'];
$add_lname = $_POST['add_lname'];
echo 'It is sang by: '.$add_fname.' '.$add_minit.' '.$add_lname.'<br />';
$add_gender = $_POST['add_gender'];
echo 'Gender: '.$add_gender.'<br />';
$add_company = $_POST['add_company'];
echo 'Belonging company is: '.$add_company.'<br />';
$add_nationality = $_POST['add_nationality'];
echo 'Nationality is: '.$add_nationality.'<br />';
$add_band = $_POST['add_band'];
echo 'Belonging band is: '.$add_band.'<br />';
$add_group = $_POST['add_group'];
echo 'Belonging group is: '.$add_group.'<br />';
$add_year = $_POST['add_year'];
echo 'The release year is: '.$add_year.'<br />';
$add_duration = $_POST['add_duration'];
echo 'The duration of this music is: '.$add_duration.'<br />';
$add_price = $_POST['add_price'];
echo 'The price of this music is: '.$add_price.'<br />';
$available_status = $_POST['available_status'];
echo 'The available status is: '.$available_status.'<br />';


$add_name = mysqli_real_escape_string($link,$_POST['add_name']);
$add_fname = mysqli_real_escape_string($link,$_POST['add_fname']);
$add_minit = mysqli_real_escape_string($link,$_POST['add_minit']);
$add_lname = mysqli_real_escape_string($link,$_POST['add_lname']);
$add_gender = mysqli_real_escape_string($link,$_POST['add_gender']);
$add_company = mysqli_real_escape_string($link,$_POST['add_company']);
$add_nationality = mysqli_real_escape_string($link,$_POST['add_nationality']);
$add_band = mysqli_real_escape_string($link,$_POST['add_band']);
$add_group = mysqli_real_escape_string($link,$_POST['add_group']);
$add_year = mysqli_real_escape_string($link,$_POST['add_year']);
$add_duration = mysqli_real_escape_string($link,$_POST['add_duration']);
$add_price = mysqli_real_escape_string($link,$_POST['add_price']);
$available_status = mysqli_real_escape_string($link,$_POST['available_status']);

//insert into music table
$sql = "INSERT INTO music (m_name, release_year, price, duration, available_status)
VALUES ('$add_name', '$add_year', '$add_price', '$add_duration', '$available_status')";

if (!mysqli_query($link,$sql)) {
	die('Error: '. mysqli_error($link));
}
$newMusicID = mysqli_insert_id($link);
echo '1 music added. New music has ID: '. $newMusicID.'<br />';

//insert into singer table
if ($add_fname != NULL) {
	$sql1 = "INSERT INTO singer (Fname, Minit, Lname, Gender, Belonging_Company, Nationality)
	VALUES ('$add_fname', '$add_minit', '$add_lname', '$add_gender', '$add_company', '$add_nationality')";

	if (!mysqli_query($link,$sql1)) {
		die('Error: '. mysqli_error($link));
	}
	$newSingerID = mysqli_insert_id($link);
	echo '1 singer added. New singer ID: '.$newSingerID.'<br />';
}

//insert into produce table
if ($newSingerID != NULL) {
	$sql2 = "INSERT INTO produce (singerID, musicID)
	VALUES ('$newSingerID', '$newMusicID')";

	if (!mysqli_query($link,$sql2)) {
		die('Error: '. mysqli_error($link));
	}
}

//insert into band table
if ($add_band != NULL) {
	$sql3 = "INSERT INTO band (B_Name, Company)
	VALUES ('$add_band', '$add_company')";

	if (!mysqli_query($link,$sql3)) {
		die('Error: '. mysqli_error($link));
	}
	$newBandID = mysqli_insert_id($link);
	echo '1 band added. Band ID: '.$newBandID.'<br />';
}

//update B_id back into singer table
if ($newBandID != NULL) {
	$sql7 = "UPDATE singer SET B_id='$newBandID' 
	WHERE S_id='$newSingerID'";
	
	if (!mysqli_query($link,$sql7)) {
		die('Error: '. mysqli_error($link));
	}
}

//insert into form4 table
if ($newBandID != NULL) {
	$sql4 = "INSERT INTO form4 (bandID, musicID)
	VALUES ('$newBandID', '$newMusicID')";

	if (!mysqli_query($link,$sql4)) {
		die('Error: '. mysqli_error($link));
	}
}

//insert into group table
if ($add_group != NULL) {
	$sql5 = "INSERT INTO musicwebsite.group (G_Name, Company)
	VALUES ('$add_group', '$add_company')";

	if (!mysqli_query($link,$sql5)) {
		die('Error: '. mysqli_error($link));
	}
	$newGroupID = mysqli_insert_id($link);
	echo '1 group added. Group ID: '.$newGroupID.'<br />';
}

//update G_id back into singer table
if ($newGroupID != NULL) {
	$sql8 = "UPDATE singer SET G_id='$newGroupID' 
	WHERE S_id='$newSingerID'";
	
	if (!mysqli_query($link,$sql8)) {
		die('Error: '. mysqli_error($link));
	}
}

//insert into form3 table
if ($newGroupID != NULL) {
	$sql6 = "INSERT INTO form3 (groupID, musicID)
	VALUES ('$newGroupID', '$newMusicID')";

	if (!mysqli_query($link,$sql6)) {
		die('Error: '. mysqli_error($link));
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
