<!DOCTYPE html>
<?php session_start(); ?>
<html>
<body>
<fieldset>
<title>DOWNLOADED</title>

<legend>Successful</legend>

<?php

echo 'Congratulations, you downloaded successfully!';

?>
<form action="musiclogout.php" method="post">
<input type="submit" value="Back to Homepage">
</form>
</fieldset>
</body>
</html>	