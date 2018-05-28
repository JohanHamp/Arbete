<?php



include 'connect.php';
include 'message.php';
$username = $_SESSION['username'];
$tblname = "messages";

$FKsenderId =

$meddelande = $_POST['message'];
$FkreceiverId = $_POST['kontakt'];

$sql = "INSERT INTO $tblname (Message, FKsenderId, FkreceiverId)
VALUES ('$meddelande', '$username', '$FkreceiverId')";

if ($conn->query($sql) === TRUE) {
}
else {
  echo "error" .$sql . "<br>" . $conn->error;
}



header("Location: message.php");
?>
