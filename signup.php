<!DOCTYPE html>
<?php session_start(); ?>
<html>
<body>
<fieldset>
<legend>Sigh Up for MUS!C</legend>
<?php
$link=mysqli_connect("localhost","root",'root',"musicwebsite");
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
$name=$_POST['name'];
$newemail=$_POST['email'];
$password=$_POST['password'];
$repassword=$_POST['repassword'];
$query="SELECT COUNT(email) AS Valid FROM user WHERE email LIKE "."'".$newemail."'";
$result = mysqli_query($link, $query);	
$row = mysqli_fetch_array($result);
$query2="SELECT COUNT(U_name) AS Valid2 FROM user WHERE U_name LIKE "."'".$name."'";
$result2 = mysqli_query($link, $query);	
$row2 = mysqli_fetch_array($result2);
if($row[0] == '0' && $row2[0]=='0'){
if($password == $repassword){
// $query2 = "INSERT INTO user (U_name,U_password,email) VALUES ('$name', '$password', '$newemail')";
$query3 = "INSERT INTO user(U_name,U_password,email,Regist_date,Account_balance)
VALUES ('".$name."',".$password.",'".$newemail."','2014-05-07',0)";
mysqli_query($link, $query3);
$result3 = mysqli_query($link, "SELECT U_id AS Valid3 FROM user WHERE U_name LIKE "."'".$name."'");
$row3 = mysqli_fetch_array($result3);
$_SESSION['U_id']=$row3[0];
echo 'Hi, '.$name.'. ';
echo "Congratulations! Enjoy your music journey! Go to Your Homepage Now.<br><br>";
?>
<form action="RegisteredUser.php" method="post">
<input type="submit" value="Go to My Homepage">
</form>
<?php
}
else{echo "Please confirm your password.";
?>
<form action="signup.html" method="post">
<input type="submit" value="Back to Sign Up Page">
</form>
<?php
}
}
else {echo "Sorry. This email has been registered.";
?>
<form action="signup.html" method="post">
<input type="submit" value="Back to Sign Up Page">
</form>
<?php
}
?>
</fieldset>
</body>
</html>	