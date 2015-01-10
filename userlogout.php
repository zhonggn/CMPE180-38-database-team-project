<?php
session_start();

// create connection
// $link=mysqli_connect("localhost","root",'root',"musicwebsite");
// if (!$link) {
    // die('Could not connect: ' . mysql_error());
// }
//echo 'Connected successfully'.'<br>';
if(isset($_SESSION['user_name']))
  {unset($_SESSION['user_name']);}
if(isset($_SESSION['U_id']))
  {unset($_SESSION['U_id']);}
// session_destroy();


header("Location: unsigned-user.php");
// mysql_close($link);
?>