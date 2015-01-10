<!DOCTYPE html>
<html>

<HEAD>
</HEAD>
<BODY>
<h1>Unsigned User</h1>
<div>
<div style='float:left;width:30%'>
<h3><a href="EnterTheWebsite.html" target="_top">Home</a></h3>
<h3><a href="User_login.html" target="_top">sign in</a> </h3>
<h3><a href="signup.html" target="_top">sign up</a></h3>



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
  // listen($row['m_Id']); 
  
 // $result2 = mysqli_query($con,"SELECT music_genre.genre FROM music_genre join music on 
//music_genre.m_id= music.m_Id WHERE music.m_name = '$row[m_name]' ");
//$row2 = mysqli_fetch_array($result2);
//echo $row2['genre'];
  ?>
  <form action="unregistered_details.php" method="post">
<input type="hidden" name= "m_Id" value="<?php echo $row['m_Id'];?>">
<input type="submit" value="Details">
</form>
<form action="unregistered_playsong.php" method="post">
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
  // listen($row['m_Id']); 
  ?>
  
<form action="unregistered_details.php" method="post">
<input type="hidden" name= "m_Id" value="<?php echo $row['m_Id'];?>">
<input type="submit" value="Details">
</form>
<form action="unregistered_playsong.php" method="post">
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
</BODY>
</HTML>