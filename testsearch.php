<?php
session_start();
$U_id=$_SESSION['U_id'];

error_reporting ( 0 );
require 'connect.php';


$aos = $_POST ['aos'];

// php for user search music by id,name
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
					$output .= '<div>' . MusicID . ' ' . $m_Id . '  ' . MUSIC_NAME . ' ' . $m_name . ' ' . Release_year . ' ' . $release_year . ' ' . Price . ' $' . $price . ' ' . Duration . ' ' . $duration . ' ' . Available_status . ' ' . $available_status . ' ' . $playes_times .
				
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
// presentation query who is the most popular singer by who help us earn more money fail

if ($result2 = $db->query ( "SELECT * FROM singer " )) {
	if ($count = $result2->num_rows) {
		// echo '<p>', $count, '</p>';
		
		while ( $row = $result2->fetch_object () ) {
			// echo $row->first_name, ' ', $row->last_name,'<br>';
			$S_id = $row->S_id;
			$Fname = $row->Fname;
			
			$output2 = '<div>' . $S_id . ' ' . FName . ' ' . $Fname . '</div>';
		}
		
		$result2->free ();
	}
} else
	$output .= "I am sorry. There is no result that you want to search in our database. Please try again";
?>


//HTML start
<!DOCTYPE head PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<head>
<title>Search</title>
</head>





//start html body using black background by using "#000001" command out code is the other picture for background
<body bgcolor="#000001">


//Hello USER display Logout button (smart)
<p align="right"><span style="color: white"><?php 

if($_SESSION['user_name']==null){echo '<h3><a href="User_login.html" target="_top">sign in</a> </h3>
                                       <h3><a href="signup.html" target="_top">sign up</a></h3></p>';}
else
{
//Hello
$U_name= $_SESSION['user_name'];
echo Hello.' '.$U_name.'<br><br>';
//logout
echo'<form action="userlogout.php" method="post">
<p align="right"><input type="submit" name="out" value="Log out   " /></p>
</form>
<right>';
}



?>
</span></p>



//search title
<center><span style="color: cyan">    _____________</span>
<font size="40"><span style="color: white">Search</span></font>
<span style="color: cyan">    _____________</span></center>


//main search part. 1. selection have search by music, singer,band, group.  2. input text. 3. submit button and return to this page again
<form action="testsearch.php" method="post">
<p align="center">
<span style="color: white"><select name="aos">
					<option value="music">Music</option>
					<option value="singer">Singer</option>
					<option value="band">Band</option>
					<option value="group">Group</option>

					<input type="text" name="search" placeholder="search for musics.."
					size="50" />
					<input type="submit" value="Search" />
</p>
</form>

//Button HOMEPAGE button

<form action="EnterTheWebsite.html" method="post">
<input type="submit" name="home" value="HOMEPAGE        " class="left" />
</form>
<right>



//Button(smart) RegisteredUserBUTTON if no name. this button will not display.

<?php 
if(!$_SESSION['user_name']==null){
echo'<form action="RegisteredUser.php" method="post">
<input type="submit" name="home" value="UserDashBoard  " class="left" />
</form>
<right>';}?>


//M_id SESSION
<?php $_SESSION['m_Id']=$m_Id;  ?>


//Button(smart)  Add to shopping cart button  ()
<?php 
if(!$_SESSION['user_name']==null){
echo '<form action="buy.php" method="post">
<input type="submit" name="m_Id" value="Buy!!!!!!!!            " class="left" />
</right>
</form>';}
?>

// PLAY button  text for input music id "m_Id" and button to play music and go to play.php(no this file)
<! form action="play.php" method="post">
<! input type="submit" name="play" value="Please select a Music ID you want to Play" class="left" />
<! input type="text" name="m_Id" placeholder="Play musics!!!!!!"size="12" /> 
<! /form>



//Button Show Button ( who is the most popular singer)
<! form action="presentationquery.php" method="post">
<! input type="submit" name="play" value="Most popular singer          " class="left" />

//</form>



//php print out our search data. using white word. comment out part can show picture by user's search. if statement.
<right> <span style="color: white">
<?php
//print ("$output") ;
echo '<center> '.$output.' </center>' ;
// print ("$output2") ;

// change part buy botton and play button may change

/*
 * if ($Fname == 'taylor') { echo '<center> Taylor Swift'; echo '</br><center><img src="taylorswift.jpg" height="300" width="300"></center>'; }
 */
?></span></right>




</body>
</html>