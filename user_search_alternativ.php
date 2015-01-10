<div>
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
</div>


<div style='float:right;width:70%'>
<?php
$con=mysqli_connect("localhost","root","root","musicwebsite");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<h2>Genre: Alternativ</h2>
<?php

$result = mysqli_query($con,"SELECT * 
FROM music join music_genre on music.m_Id = music_genre.m_id
WHERE genre ='alternativ'");

function listen($music){
$file="$music.mp3";
echo "<embed src =\"$file\" autostart=\"false\" height=\"18\" width = \"100\" ></embed>";
}



  while($row = mysqli_fetch_array($result)) {
    echo $row['m_name'];
    echo "    ";
    listen($row['m_Id']);
    ?>
    <button type="button" onclick="alert('<?php 
   echo $row['m_name'];
   echo '\n';
   echo "Year:";
   echo $row['release_year']; 
   echo '\n';
   echo "Price:";
   echo $row['price'];
   echo '\n';
   echo "Duration:";
   echo $row['duration'];
   echo '\n';
   echo "Available status:";
   echo $row['available_status']; 
   echo '\n';
   echo "Played times:";
   echo $row['played_times']; 
   
  $result2 = mysqli_query($con,"SELECT music_genre.genre FROM music_genre join music on 
music_genre.m_id= music.m_Id WHERE music.m_name = '$row[m_name]' ");
$row2 = mysqli_fetch_array($result2);
echo '\n';
echo "Genre:";
echo $row2['genre'];  

 $result3 = mysqli_query($con,"SELECT language FROM music_language join music on 
music_language.m_id= music.m_Id WHERE music.m_name = '$row[m_name]' ");
$row3 = mysqli_fetch_array($result3);
echo '\n';
echo "Language:";
echo $row3['language'];
   
    $result4 = mysqli_query($con,"SELECT writer FROM music_writer join music on 
music_writer.m_id= music.m_Id WHERE music.m_name = '$row[m_name]' ");
$row4 = mysqli_fetch_array($result4);
echo '\n';
echo "Writer:";
echo $row4['writer'];
   
   ?>')">Details</button>
    
    <?php
    echo "<br>";
  }


mysqli_close($con);

?>

</div>
</div>