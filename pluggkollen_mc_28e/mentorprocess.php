<?php
session_start();
if(!isset($_SESSION['inlogged'])){
  header("Location:Login.php");
}
else
{
  $username = $_SESSION['username'];
}

include 'connect.php';

$mentorcheckbox = $_POST['mentorcheckbox'];

if(!empty($mentorcheckbox)){

  $sql = "UPDATE user SET anvtyp = 'mentor' WHERE personnummer = $username OR epost = $username;";

  if ($conn->query($sql) === TRUE)
  {
    echo "Du kan nu vara mentor för de kurser som du avslutat!";
  }

}
else{
  echo "Error: " . $sql . "<br>" . $conn->error;
  echo "<h1> Registrationen misslyckades. Var vänlig försök igen!</h1>";
}

?>
