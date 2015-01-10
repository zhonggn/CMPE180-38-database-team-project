<?php session_start(); ?>

<!DOCTYPE html>
<html>
<body>
<fieldset>

<div id="content" style="background-color:#B0B0B0;height:600px;width:1250px;float:left;">
<?PHP
// create connection
$link=mysqli_connect("localhost","root",'root',"musicwebsite");
// Check connection
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'User Balance: <br>';
if (isset($_SESSION['U_id'])) {
	$U_id = $_SESSION['U_id'];
	
	$query = "SELECT Account_balance FROM user AS U WHERE U.U_Id = ".$U_id;

	if (!mysqli_query($link,$query)) {
		die('Error: '.myquli_error($link));
	}
}
$result = mysqli_query($link, $query);

while ($row = mysqli_fetch_array($result)) {
	if ($row['Account_balance']) {
		echo 'Wow you have '.$row['Account_balance'].' in your account!!<br>';
		
		

?>
<form action="RegisteredUser.php" method="post">
<input type="submit" value="Back to Registered User">
</form>

<?php
		exit; 
	} else {
		
	}
}		
mysql_close($link);
?>



</div>


</fieldset>
</body>
</html>