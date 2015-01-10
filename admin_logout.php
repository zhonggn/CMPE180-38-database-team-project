<?php
// create connection
$link=mysqli_connect("localhost","root",'root',"musicwebsite");

// Check connection
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
//echo 'Connected successfully'.'<br>';
if(isset($_SESSION['admin_name']))
  unset($_SESSION['admin_name']);
if(isset($_SESSION['admin_id']))
  unset($_SESSION['admin_id']);

header("Location: admin_login.html");

mysql_close($link);
?>