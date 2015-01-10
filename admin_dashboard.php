<?php session_start(); ?>
<!DOCTYPE html>
<html>
<body>

<fieldset>

<legend>Administrator Dashboard</legend>
<p>
These are what you can do now.
</p>
<p>
<form action="administratorsearch.php" method="post">
<input type="submit" name="adminsearch" value="Search" class="left"/>
<?PHP $_SESSION['A_name'];?>
</form>
</p>
<p>
<form action="add_music.html" method="post">
<input type="submit" name="addmusic" value="Add music" class="left"/>
</form>
</p>
<p>
<form action="update_music.html" method="post">
<input type="submit" name="updatemusic" value="Update music" class="left"/>
</form>
</p>
<p>
<form action="delete_music.html" method="post">
<input type="submit" name="deletemusic" value="Delete music" class="left"/>
</form>
</p>
<p>
<form action="add_singer.html" method="post">
<input type="submit" name="addsinger" value="Add singer" class="left"/>
</form>
</p>
<p>
<form action="update_singer.html" method="post">
<input type="submit" name="update_singer" value="Update singer" class="left"/>
</form>
</p>
<p>
<form action="delete_singer.html" method="post">
<input type="submit" name="deletesinger" value="Delete singer" class="left"/>
</form>
</p>
<p>
<form action="delete_band.html" method="post">
<input type="submit" name="deleteband" value="Delete band" class="left"/>
</form>
</p>
<p>
<form action="delete_group.html" method="post">
<input type="submit" name="deletegroup" value="Delete group" class="left"/>
</form>
</p>
<p>
<form action="add_user.html" method="post">
<input type="submit" name="adduser" value="Add user" class="left"/>
</form>
</p>
<p>
<form action="delete_user.html" method="post">
<input type="submit" name="deleteuser" value="Delete user" class="left"/>
</form>
</p>
<p>
<form action="admin_logout.php" method="post">
<input type="submit" name="logout" value="Logout" class="left"/>
</form>
</p>

</fieldset>

</body>
</html>