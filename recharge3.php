<!DOCTYPE html>
<?php session_start(); ?>
<html>
<body>
<fieldset>
<title>RECHARGE</title>

<legend>Recharge Your Account</legend>

<?php
$link=mysqli_connect("localhost","root",'root',"musicwebsite");
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
$U_id=$_SESSION['U_id'];

$query1 = "SELECT Account_balance FROM user WHERE U_Id = ".$U_id;
$result1 = mysqli_query($link,$query1);
$row = mysqli_fetch_array($result1);


echo 'Recharged Succesfully! Your balance is $'.$row[0].' now :)<br><br>';

?>
<form action="RegisteredUser.php" method="post">
<input type="submit" value="Back to My Homepage">
</form>

</fieldset>
</body>
</html>	