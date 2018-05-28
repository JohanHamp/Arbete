<?php
include 'connect.php';

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

//Query för att kolla om så att personen skriver in rätt epost och lösenord
$sql = "SELECT * FROM user WHERE (epost = '$username' OR personnummer = '$username') AND password = '$password'";
$resultat = mysqli_query($conn, $sql)or die("Bad SQL: $sql");


if(mysqli_num_rows($resultat) > 0){
  echo "Success";
  SESSION_START();
  $_SESSION['inlogged'] = true;
  $_SESSION['username'] = $username;
  header('Location: firstpage.php');
  exit();

}else {
  echo "Fail";
}
 ?>
