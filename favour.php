<!DOCTYPE html>
<?php session_start(); ?>
<html>
<body>
<fieldset>
<title>LIKE</title>
<legend>Like</legend>

<?php
$link=mysqli_connect("localhost","root",'root',"musicwebsite");
if (!$link) {
    die('Could not connect: ' . mysql_error());

	}

$m_Id=$_SESSION['m_Id'];
$U_id=$_SESSION['U_id'];
$result = mysqli_query($link,"SELECT * FROM favor WHERE m_Id= '$m_Id' AND U_id='$U_id'");
$row = mysqli_fetch_array($result);

if ($row[0]!=0){
mysqli_query($link,"DELETE FROM favor WHERE m_Id= '$m_Id' AND U_id='$U_id'");
echo 'You have unliked this song.';?>
<form action="details.php" method="post">
<input type="hidden" name= "m_Id" value="<?php echo $m_Id;?>">
<input type="submit" value="Back to Details">
</form>
<form action="musiclogout.php" method="post">
<input type="submit" value="Back to Homepage">
</form>

<?php
}

else{
mysqli_query($link,"INSERT INTO favor(m_Id,U_id) VALUES ('$m_Id','$U_id')");
echo 'You have liked this song.';
?>
<form action="details.php" method="post">
<input type="hidden" name= "m_Id" value="<?php echo $m_Id;?>">
<input type="submit" value="Back to Details">
</form>
<form action="musiclogout.php" method="post">
<input type="submit" value="Back to Homepage">
</form>
<?php
}
?>

</fieldset>
</body>
</html>	