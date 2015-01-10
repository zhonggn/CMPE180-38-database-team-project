<!DOCTYPE html>
<?php session_start(); ?>
<html>
<body>
<fieldset>
<title>Download</title>
<legend>Download</legend>


<?php
$link=mysqli_connect("localhost","root",'root',"musicwebsite");
if (!$link) {
    die('Could not connect: ' . mysql_error());

	}

$m_Id=$_SESSION['m_Id'];
$U_id=$_SESSION['U_id'];
$result = mysqli_query($link,"SELECT COUNT(*) FROM buy WHERE m_Id= '$m_Id' AND U_id = '$U_id'");
$row = mysqli_fetch_array($result);
if ($row[0]!=0){
$result2 = mysqli_query($link,"SELECT COUNT(*) FROM download WHERE m_Id= '$m_Id' AND U_id = '$U_id'");
$row2 = mysqli_fetch_array($result2);
if ($row2[0]==0){
mysqli_query($link,"INSERT INTO download(m_Id,U_id) VALUES ('$m_Id','$U_id')");
header ("Location: downloadmusic.php");
}
else{
header ("Location: downloadmusic.php");
}
?>
<form action="buy.php" method="post">
<input type="submit" value="Buy">
</form>
<?php
}
else{
echo 'Sorry, you cannot download songs before you purchased them.';
echo ' Do you want to purchase this song now?';
?>
<form action="buy.php" method="post">
<input type="submit" value="Buy it now!">
</form>
<form action="musiclogout.php" method="post">
<input type="submit" value="Maybe later.">
</form>
<?php
}
?>

</fieldset>
</body>
</html>	