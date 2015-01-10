<?php
session_start();
?>
<html>
<body>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BUY</title>
</HEAD>

<fieldset>
<legend>BUY MUS!C</legend>
<form action="purchased.php" method="post">

<?php
$link=mysqli_connect("localhost","root",'root',"musicwebsite");
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

$m_Id=$_SESSION['m_Id'];
$U_Id=$_SESSION['U_id'];
// $query1 = "SELECT Account_balance FROM user WHERE U_Id = 1";
$query1 = "SELECT Account_balance FROM user WHERE U_Id = ".$U_Id;
$result1 = mysqli_query($link, $query1);
$row1 = mysqli_fetch_array($result1);
echo 'Your balance is $'.$row1[0].' now :)<br>';

// $query2 = "SELECT * FROM music WHERE m_Id = 1";
$query2 = "SELECT * FROM music WHERE m_Id =".$m_Id;
$result2 = mysqli_query($link, $query2);
$row2 = mysqli_fetch_array($result2);
$balance = $row1[0];
$price = $row2['price'];

echo 'The price of ';
echo "<span style=\"color:#ff0000;\">".$row2['m_name']."</span>";
echo ' is $'.$row2['price'].' now :)<br>';
echo 'Are you sure to purchase now?<br><br>';


?>
<input type="hidden" name='price' value ="<?php echo $price?>" >
<input type="hidden" name='balance' value ="<?php echo $balance?>" >
<input type="submit" name='yes' value="Buy it now!">
</form>
<form action="RegisteredUser.php" method="post">
<input type="submit" name='no' value="Maybe later">
</form>
<form action="unsearch.php" method="post">
<input type="submit" value="Back to Search Page">
</form>

</fieldset>
</body>
</html>