<!DOCTYPE html>
<?php session_start(); ?>
<html>
<body>
<fieldset>
<title>DETAILS</title>

<legend>Details</legend>

<?php
$link=mysqli_connect("localhost","root",'root',"musicwebsite");
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
$_SESSION['m_Id']=$_POST['m_Id'];
$m_Id=$_SESSION['m_Id'];
$U_id=$_SESSION['U_id'];

$result = mysqli_query($link,"SELECT * FROM music WHERE m_Id= '$m_Id'");
$row = mysqli_fetch_array($result);
$result2 = mysqli_query($link,"SELECT * FROM music_genre WHERE m_Id= '$m_Id'");
$row2 = mysqli_fetch_array($result2);
$result3 = mysqli_query($link,"SELECT * FROM music_language WHERE m_Id= '$m_Id'");
$row3 = mysqli_fetch_array($result3);
$result4 = mysqli_query($link,"SELECT * FROM music_writer WHERE m_Id= '$m_Id'");
$row4 = mysqli_fetch_array($result4);
$result5 = mysqli_query($link,"SELECT * FROM favor WHERE m_Id= '$m_Id' AND U_id='$U_id'");
$row5 = mysqli_fetch_array($result5);

if ($row5[0]==0){
$ifliked='Like it :)';
}
else{$ifliked='Unlike it :(';}


   echo $row['m_name'];
   echo '<br>';
   echo "Year:";
   echo $row['release_year']; 
   echo '<br>';
   echo "Price:";
   echo $row['price'];
   echo '<br>';
   echo "Duration:";
   echo $row['duration'];
   echo '<br>';
   echo "Available status:";
   echo $row['available_status']; 
   echo '<br>';
   echo "Played times:";
   echo $row['played_times'];
   echo '<br>';
   echo "Genre:";
   echo $row2['genre'];  
   echo '<br>';
   echo "Language:";
   echo $row3['language'];
   echo '<br>';
   echo "Writer:";
   echo $row4['writer'];
   
   
   
   
?>
<form action="buy.php" method="post">
<input type="submit" value="Buy">
</form>
<form action="favour.php" method="post">
<input type="submit" value="<?php echo $ifliked;?>">
</form>
<form action="download.php" method="post">
<input type="submit" value="Download">
</form>
<form action="unsearch.php" method="post">
<input type="submit" value="Back to Search Page">
</form>
<form action="RegisteredUser.php" method="post">
<input type="submit" value="Back to Homepage">

</form>
</fieldset>
</body>
</html>	