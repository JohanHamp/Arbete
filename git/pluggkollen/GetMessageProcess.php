<?php
session_start();
if(!isset($_SESSION['inlogged']))
{
 header('Location:login.php');
}
else {
  $username = $_SESSION['username'];
}

include 'connect.php';

?>
