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
$Amount=$_POST['Amount'];
// $i;
// if($i==NULL){

$query1 = "SELECT Account_balance FROM user WHERE U_Id = ".$U_id;
$result1 = mysqli_query($link,$query1);
$row = mysqli_fetch_array($result1);
$Confirm=$row[0]+$Amount;

mysqli_query($link, "START TRANSACTION");
$query="UPDATE user SET Account_balance = Account_balance + ".$Amount." WHERE U_id = ".$U_id;
$result = mysqli_query($link, $query);	
$query2 = "SELECT Account_balance FROM user WHERE U_Id = ".$U_id;
$result2 = mysqli_query($link, $query2);
$row = mysqli_fetch_array($result2);
if($Amount!=NULL && $row[0]==$Confirm){
mysqli_query($link, "COMMIT");
header("Location: recharge3.php");
$i=1;
?>
<form action="RegisteredUser.php" method="post">
<input type="submit" value="Back to My Homepage">
</form>
<?php
}
else{
mysqli_query($link,"ROLLBACK");
echo "Sorry. Error. Please Try Again. :(<br><br>";
?>
<form action="RegisteredUser.php" method="post">
<input type="submit" value="Back to My Homepage">
</form>
<?php
}
// }
// else{echo 'error';}
?>
</fieldset>
</body>
</html>	