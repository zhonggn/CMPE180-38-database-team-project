<?php session_start(); ?>

<!DOCTYPE html>
<html>
<body>
<h1>Play</h1>
<?php

$con=mysqli_connect("localhost","root","root","musicwebsite");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$m_Id=$_POST['m_Id'];
$U_id=$_SESSION['U_id'];
// $result=mysqli_query($con,"UPDATE music SET played_times = played_times + 1 WHERE m_Id='m_Id'");
// $row=mysqli_fetch_array($result);
mysqli_query($con,"UPDATE music SET played_times = played_times + 1 WHERE m_Id='$m_Id'");
mysqli_query($con,"INSERT INTO listening(m_Id,U_id) VALUES ('$m_Id','$U_id')");
?>
<button onclick="playVid()" type="button">Play</button>
<button onclick="pauseVid()" type="button">Pause</button> 
<br> 

<audio id="video1">
  <source src="<?php echo $m_Id;?>.mp3" type="audio/mpeg" >    
</audio>

<script> 
var myVideo=document.getElementById("video1"); 
function playVid()
  { 
  myVideo.play(); 
  } 
function pauseVid()
  { 
  myVideo.pause(); 
  } 
</script> 

<form action="musiclogout.php" method="post">
<input type="submit" value="Back to Homepage">
</form>

</body>
</html>

     
      