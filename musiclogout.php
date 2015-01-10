<?php

session_start();

if(isset($_SESSION['m_Id']))
  unset($_SESSION['m_Id']);

header("Location: RegisteredUser.php");

?>