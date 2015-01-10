<!DOCTYPE html>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RECHARGE</title>
</HEAD>
<BODY>
<fieldset>
<legend>Recharge Your Account$</legend>
<form action="recharge2.php" method="POST">
<p>Credit you want to purchase: <input type="text" name="Amount" required/></p>
<p>Card Information:</p>
<p>First Name: <input type="text" name="FirstName" required/></p>
<p>Last Name: <input type="text" name="LastName" required/></p>
<p>Card Number: <input type="text" name="CardNumber" required/></p>
<p>Valid Date: <select name="Month" required>
<option value=""></option>
<option value="Jan">Jan</option>
<option value="Feb">Feb</option>
<option value="Mar">Mar</option>
<option value="Apr">Apr</option>
<option value="May">May</option>
<option value="Jun">Jun</option>
<option value="Jul">Jul</option>
<option value="Aug">Aug</option>
<option value="Sep">Sep</option>
<option value="Oct">Oct</option>
<option value="Nov">Nov</option>
<option value="Dec">Dec</option>
</select>/
Valid Date: <select name="Year" required>
<option value=""></option>
<option value="2013">2013</option>
<option value="2014">2014</option>
<option value="2015">2015</option>
<option value="2016">2016</option>
<option value="2017">2017</option></select></p>
<p>Security Number<input type="text" name="SecurityNumber" size="2" maxlength="3" required/></p>
<p>Card Type: <select name="CardType" required>
<option value=""></option>
<option value="Master">Master</option>
<option value="Visa">Visa</option>
<option value="Discover">Discover</option>
</select></p>
<input type="submit" name="submit" value="Submit" />
</form>
</fieldset>
</BODY>