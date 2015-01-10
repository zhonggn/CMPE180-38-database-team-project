<?php
/*$con=mysqli_connect("localhost","root",'root',"musicwebsite");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else print "connection success";
mysqli_close($con);*/
?>

<?PHP

  
$db = new mysqli('localhost','root','root',"musicwebsite");



if($db->connect_errno){

    die('sorry, we are have a problems');
}




?>