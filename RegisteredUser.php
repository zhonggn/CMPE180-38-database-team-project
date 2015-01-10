<!DOCTYPE html>
<?php session_start(); ?>
<html>
<body>

<div id="container" style="width:1260px">

<div id="header" style="background-color:#FFFFCC;">
<h1 style="margin-bottom:0;">Registered User</h1></div>

<div id="menu" style="background-color:#CCCCFF;height:800px;width:1260px;float:left;">
<h2>Menu</h2>
<?php 
$U_name= $_SESSION['user_name'];
echo $U_name.'<br>';
// $U_id=$_SESSION['U_id'];
// echo $U_id.'<br>';
?>


<div style='float:left;width:30%'>

<h3>Genres:</h3>

<dir>
 <li><a href="user_search_pop.php">Pop</a></li>
 <li><a href="user_search_folk.php">Folk</a></li>
 <li><a href="user_search_blues.php">Blues</a></li>
 <li><a href="user_search_jazz.php">Jazz</a></li>
 <li><a href="user_search_rock.php">Rock</a></li>
 <li><a href="user_search_heavy-metal.php">Heavy Metal</a></li>
 <li><a href="user_search_R&B.php">R&B</a></li>
 <li><a href="user_search_Rap.php">Rap</a></li>
 <li><a href="user_search_hip-hop.php">Hip-Hop</a></li>
 <li><a href="user_search_alternativ.php">Alternativ</a></li>
</dir>


<li><h3><a href="testsearch.php">Search Music</a></h3></li>

<li><a href="RecentPlayedList.php">Played List</a></li><br>
<li><a href="RecentDownloadedList.php">DownLoaded List</a></li><br>
<li><a href="RecentPurchasedList.php">Purchased List</a></li><br>
<li><a href="MyFavoredList.php">My Favourite List</a></li><br>
<li><a href="UsersBalance.php">My Balance</a></li>

<form action="recharge.php" method="post">
<input type="submit" value="Recharge My Account">
</form><br>
<form action="userlogout.php" method="post">
<input type="submit" value="Log Out">
</form>

</div>


<div style='float:right;width:70%'>

<div>
<div style='float:left;width:50%'>
<h3>Music recently released:</h3>

<?php
//create connection
$con=mysqli_connect("localhost","root","root","musicwebsite");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

function listen($music){
$file="$music.mp3";
echo "<embed src =\"$file\" autostart=\"false\" height=\"18\" width = \"100\" id=\"music\"></embed>";
 
}

$result = mysqli_query($con,"SELECT * FROM music WHERE release_year>2000 ORDER BY
release_year DESC");


while($row = mysqli_fetch_array($result)) {
  echo $row['m_name'] ." ". $row['release_year'];

  
  ?>
<form action="details.php" method="post">
<input type="hidden" name= "m_Id" value="<?php echo $row['m_Id'];?>">
<input type="submit" value="Details">
</form>
<form action="playsong.php" method="post">
<input type="hidden" name= "m_Id" value="<?php echo $row['m_Id'];?>">
<input type="submit" value="Play">
</form>


   <?php
  echo "<br>";
}
?>
</div>

<div style='float:right;width:50%'>
<h3>Music most popular:</h3>
<?php
  
$result1 = mysqli_query($con,"SELECT * FROM music WHERE played_times>1 ORDER BY 
played_times DESC");

while($row = mysqli_fetch_array($result1)) {
  echo $row['m_name'];

  ?>
  
<form action="details.php" method="post">
<input type="hidden" name= "m_Id" value="<?php echo $row['m_Id'];?>">
<input type="submit" value="Details">
</form>


<form action="playsong.php" method="post">
<input type="hidden" name= "m_Id" value="<?php echo $row['m_Id'];?>">
<input type="submit" value="Play">
</form>

<?php
  echo "<br>";
}


mysqli_close($con);
?>
</div>
</div>
</div>

<div id="footer" style="background-color:#FFA500;clear:both;text-align:center;">
Presented by Team #5</div>

</div>

</body>
</html>