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

$add_fname = mysqli_real_escape_string($link,$_POST['add_fname']);
$add_minit = mysqli_real_escape_string($link,$_POST['add_minit']);
$add_lname = mysqli_real_escape_string($link,$_POST['add_lname']);
$add_gender = mysqli_real_escape_string($link,$_POST['add_gender']);
$add_company = mysqli_real_escape_string($link,$_POST['add_company']);
$add_nationality = mysqli_real_escape_string($link,$_POST['add_nationality']);
$add_band = mysqli_real_escape_string($link,$_POST['add_band']);
$add_group = mysqli_real_escape_string($link,$_POST['add_group']);

//insert into singer table
$sql = "INSERT INTO singer (Fname, Minit, Lname, Gender, Belonging_Company, Nationality)
VALUES ('$add_fname', '$add_minit', '$add_lname', '$add_gender', '$add_company', '$add_nationality')";

if (!mysqli_query($link,$sql)) {
	die('Error: '. mysqli_error($link));
}
$newSingerID = mysqli_insert_id($link);
echo '1 singer added. New singer ID: '.$newSingerID.'<br />';

//insert into band table
if ($add_band != NULL) {
	$sql1 = "INSERT INTO band (B_Name, Company)
	VALUES ('$add_band', '$add_company')";

	if (!mysqli_query($link,$sql1)) {
		die('Error: '. mysqli_error($link));
	}
	$newBandID = mysqli_insert_id($link);
	echo '1 band added. Band ID: '.$newBandID.'<br />';
}

//update B_id back into singer table
if ($newBandID != NULL) {
	$sql2 = "UPDATE singer SET B_id='$newBandID' 
	WHERE S_id='$newSingerID'";
	
	if (!mysqli_query($link,$sql2)) {
		die('Error: '. mysqli_error($link));
	}
}

//insert into group table
if ($add_group != NULL) {
	$sql3 = "INSERT INTO musicwebsite.group (G_Name, Company)
	VALUES ('$add_group', '$add_company')";

	if (!mysqli_query($link,$sql3)) {
		die('Error: '. mysqli_error($link));
	}
	$newGroupID = mysqli_insert_id($link);
	echo '1 group added. Group ID: '.$newGroupID.'<br />';
}

//update G_id back into singer table
if ($newGroupID != NULL) {
	$sql4 = "UPDATE singer SET G_id='$newGroupID' 
	WHERE S_id='$newSingerID'";
	
	if (!mysqli_query($link,$sql4)) {
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