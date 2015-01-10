<?php
error_reporting ( 0 );
require 'connect.php';
session_start();
$aos = $_POST ['aos'];

// php for administrator search music by id,name

if (isset ( $_POST ['search'] )) {
	if ($aos == "music") {
		$searchq = $_POST ['search'];
		$searchq = preg_replace ( "#[^0-9a-z]#i", " ", $searchq );
		if ($result = $db->query ( "SELECT * FROM music WHERE m_Id  LIKE  '$searchq' OR m_name LIKE '%$searchq%'" )) {
			if ($count = $result->num_rows) {
				// echo '<p>', $count, '</p>';
				
				while ( $row = $result->fetch_object () ) {
				 
					$m_Id = $row->m_Id;
					$m_name = $row->m_name;
					$release_year = $row->release_year;
					$price = $row->price;
					$duration = $row->duration;
					$available_status = $row->available_status;
					$played_times = $row->played_times;
	if(!$_SESSION['U_id']==null){
$link='<form action="details.php" method="post">
<input type="hidden" name= "m_Id" value="'.$m_Id.'">
<input type="submit" value="Details">
</form>

<form action="playsong.php" method="post">
<input type="hidden" name= "m_Id" value="'.$m_Id.'">
<input type="submit" value="Play">
</form>';}
else{
$link='<form action="unregistered_details.php" method="post">
<input type="hidden" name= "m_Id" value="'.$m_Id.'">
<input type="submit" value="Details">
</form>


<form action="unregistered_playsong.php" method="post">
<input type="hidden" name= "m_Id" value="'.$m_Id.'">
<input type="submit" value="Play">
</form>';
}
					$output .= '<div>'

					. MusicID . ' ' . $m_Id . '  ' . MUSIC_NAME . ' ' . $m_name . ' ' . Release_year . ' ' . $release_year . ' ' . Price . ' $' . $price . ' ' . Duration . ' ' . $duration . ' ' . Available_status . ' ' . $available_status . ' ' . $playes_times .
				
					$link . '</div>';
				
				}
				$result->free ();
			} else
				$output .= "I am sorry. There is no result that you want to search in our database. Please try again";
		}
	}
}
// administrator search singer by S_id, Fname, Gender, Nationality
if (isset ( $_POST ['search'] )) {
	if ($aos == "singer") {
		$searchq = $_POST ['search'];
		$searchq = preg_replace ( "#[^0-9a-z]#i", "", $searchq );
		if ($result = $db->query ( "SELECT * FROM singer WHERE S_id LIKE '$searchq' OR Fname LIKE '%$searchq%' OR Gender LIKE '$searchq' OR Nationality LIKE '$searchq' " )) {
			if ($count = $result->num_rows) {
				// echo '<p>', $count, '</p>';
				
				while ( $row = $result->fetch_object () ) {
					// echo $row->first_name, ' ', $row->last_name,'<br>';
					$S_id = $row->S_id;
					$Fname = $row->Fname;
					$Minit = $row->Minit;
					$Lname = $row->Lname;
					$Gender = $row->Gender;
					$Nationality = $row->Nationality;
					
					$output .= '<div>' . $S_id . ' ' . Fname . ' ' . $Fname . ' ' . Minit . ' ' . $Minit . ' ' . Lname . ' ' . $Lname . ' ' . Gender . ' ' . $Gender . ' ' . Nationality . ' ' . $Nationality . '</div>';
				}
				$result->free ();
			} else
				$output .= "I am sorry. There is no result that you want to search in our database. Please try again";
		}
	}
}
// administrator search band by B_id and B_Name

if (isset ( $_POST ['search'] )) {
	if ($aos == "band") {
		$searchq = $_POST ['search'];
		$searchq = preg_replace ( "#[^0-9a-z]#i", "", $searchq );
		if ($result = $db->query ( "SELECT * FROM band WHERE B_id LIKE '$searchq' OR B_Name LIKE '%$searchq%'OR Company LIKE '%$searchq%'" )) {
			if ($count = $result->num_rows) {
				// echo '<p>', $count, '</p>';
				
				while ( $row = $result->fetch_object () ) {
					// echo $row->first_name, ' ', $row->last_name,'<br>';
					$B_id = $row->B_id;
					$B_Name = $row->B_Name;
					$Company = $row->Company;
					
					$output .= '<div>' . $B_id . ' ' . BandName . ' ' . $B_Name . ' ' . BelogingCompany . ' ' . $Company . '</div>';
				}
				
				$result->free ();
			} else
				$output .= "I am sorry. There is no result that you want to search in our database. Please try again";
		}
	}
}
// search group
// OR G_Name LIKE '%$searchq%'OR Company LIKE '%$searchq%'
if (isset ( $_POST ['search'] )) {
	if ($aos == "group") {
		$searchq = $_POST ['search'];
		$searchq = preg_replace ( "#[^0-9a-z]#i", " ", $searchq );
		if ($result = $db->query ( "SELECT * FROM musicwebsite.group WHERE G_id LIKE '$searchq' OR G_Name LIKE '%$searchq%'" )) {
			if ($count = $result->num_rows) {
				// echo '<p>', $count, '</p>';
				
				while ( $row = $result->fetch_object () ) {
					// echo $row->first_name, ' ', $row->last_name,'<br>';
					$G_id = $row->G_id;
					$G_Name = $row->G_Name;
					$Company = $row->Company;
					
					$output .= '<div>' . $G_id . ' ' . GroupName . ' ' . $G_Name . ' ' . BelogingCompany . ' ' . $Company . '</div>';
				}
				
				$result->free ();
			} else
				$output .= "I am sorry. There is no result that you want to search in our database. Please try again";
		}
	}
}
// search user
if (isset ( $_POST ['search'] )) {
	if ($aos == "user") {
		$searchq = $_POST ['search'];
		$searchq = preg_replace ( "#[^0-9a-z]#i", "", $searchq );
		if ($result = $db->query ( "SELECT * FROM user WHERE U_id LIKE '$searchq'OR U_name LIKE '%$searchq%'OR U_password LIKE '$searchq'" )) {
			if ($count = $result->num_rows) {
				// echo '<p>', $count, '</p>';
				
				while ( $row = $result->fetch_object () ) {
					// echo $row->first_name, ' ', $row->last_name,'<br>';
					$U_id = $row->U_id;
					$U_name = $row->U_name;
					$U_password = $row->U_password;
					$email = $row->email;
					$Regist_date = $row->Regist_date;
					
					$output .= '<div>' . $U_id . ' ' . UserName . ' ' . $U_name . ' ' . Uerpassword . ' ' . $U_password . ' ' . Useremail . ' ' . $email . ' ' . Regist_date . ' ' . $Regist_date . '</div>';
				}
				
				$result->free ();
			} else
				$output .= "I am sorry. There is no result that you want to search in our database. Please try again";
		}
	}
}

?>



<!DOCTYPE head PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<head>
<title></title>
</head>
</form>

<form action="admin_dashboard.php" method="post">
<p align="left"><input type="submit" value="Return to dashboard">
</form>

//Hello name display
<?php 
$A_name= $_SESSION['A_name'];
echo '<p align="right"><span style="color: white">Hello.'.$A_name.'</p>';
//logout
echo'<form action="admin_login.html" method="post">
<p align="right"><input type="submit" name="out" value="Log out   " /></p>
</form>
<right>';
		
?>
<center>

<span style="color: greenyellow">    ______________</span>
<font size="40"><span style="color: white">Search</span></font>
<span style="color: greenyellow">    ______________</span>


</center>
<p></p>

<body bgcolor="#000000">

	<! body background="music.jpg" height="300" width="300">
	div { background:url(music.jpg); background-size:80px 60px;
	background-repeat:no-repeat; }
	<form action="administratorsearch.php" method="post">

		<p align="center">
			<span style="color: white"><select name="aos">
					<option value="music">Music</option>
					<option value="singer">Singer</option>
					<option value="band">Band</option>
					<option value="group">Group</option>
					<option value="user">User</option>

					<input type="text" name="search" placeholder="search for musics.."size="50" />
					<input type="submit" value="Search" />
		
		

		
	</p>
	

	<span style="color: white">
	
<?php
echo '<center> '.$output.' </center>' ;
//print ("$output");
if ($fname == 'taylor') {
	
	echo '</br></br></br></br></br></br></br></br></br></br></br></br><center> Taylor Swift';
	echo '</br><center><img src="../picture/taylorswift.jpg" height="300" width="300"></center>';
}
?></span>
	</right>
</html>