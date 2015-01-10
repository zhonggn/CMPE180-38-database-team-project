<?php
session_start();
?>
<html>
<body>

<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PURCHASE</title>
</HEAD>
<fieldset>
<legend>PURCHASE :)</legend>
<?php
$link=mysqli_connect("localhost","root",'root',"musicwebsite");
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
$m_Id=$_SESSION['m_Id'];
$U_Id=$_SESSION['U_id'];

$price = $_POST['price'];
$balance = $_POST['balance'];
$confirm = $_POST['balance'] - $_POST['price'];

if ($price <= $balance){
$purchased = mysqli_query($link,"SELECT COUNT(*) AS temp FROM buy WHERE U_Id =".$U_Id." AND m_Id =".$m_Id);
$row1 = mysqli_fetch_array($purchased);
if ($row1[0] == 0){
mysqli_query($link, "START TRANSACTION");
mysqli_query($link, "UPDATE user SET Account_balance = Account_balance -".$price."WHERE U_Id=".$U_Id);
mysqli_query($link, "INSERT INTO buy(m_Id,U_Id) VALUES (".$m_Id.",".$U_Id.")");
$newbalance = mysqli_query($link, "SELECT Account_balance FROM user WHERE U_Id=".$U_Id);
$row2 = mysqli_fetch_array($newbalance);
$newpurchased = mysqli_query($link,"SELECT COUNT(*) AS temp FROM buy WHERE U_Id =".$U_Id." AND m_Id = ".$m_Id);
$row3 = mysqli_fetch_array($newpurchased);
if ($row2[0]==$confirm && $row3[0]=1){
mysqli_query($link, "COMMIT");
echo "Purchased Successfully! :)<br><br>";
?>
<form action="musiclogout.php" method="post">
<input type="submit" value="Back to Homepage">
</form>
<?php
}
else{
mysqli_query($link,"ROLLBACK");
echo "Sorry. Error. Please Try Again. :(<br><br>";
?>
<form action="buy.php" method="post">
<input type="submit" value="Back to Buy MUS!C Page">
</form>
<?php
}
}
else{echo 'You purchased this song before. Please enjoy it :)<br><br>';
?>
<form action="musiclogout.php" method="post">
<input type="submit" value="Back to Homepage">
</form>
<?php
}
}
else{echo "Your balance is not enough to purchase this song. Please recharge your account.<br><br>"
?>
<form action="musiclogout.php" method="post">
<input type="submit" value="Recharge My Account">
</form>
<?php
}
?>
</body>
</html>