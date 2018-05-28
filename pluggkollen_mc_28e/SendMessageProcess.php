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

$tblname = "messages";

$kontakt = "kontakt";

$meddelande = $_POST['message'];
$FkreceiverId = $_POST['kontakt'];

$sql = "INSERT INTO $tblname (Message, FKsenderId, FkreceiverId)
VALUES ('$meddelande', '$username', '$FkreceiverId')";

if ($conn->query($sql) === TRUE) {
  echo "<script type='text/javascript'>alert('meddelandet skickat!');</script>";
}
else {
  echo "error" .$sql . "<br>" . $conn->error;
}


header("Location: message.php");
?>
