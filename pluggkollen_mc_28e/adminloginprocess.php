
<?php
include 'connect.php';

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

//Query för att kolla om så att personen skriver in rätt epost och lösenord
$sql = "SELECT * FROM user WHERE (epost = '$username' OR personnummer = '$username') AND password = '$password' AND anvtyp = 'admin'";
$resultat = mysqli_query($conn, $sql)or die("Bad SQL: $sql");


if(mysqli_num_rows($resultat) > 0){
  echo "Success";
  SESSION_START();
  $_SESSION['inloggedadmin'] = true;
  $_SESSION['username'] = $username;
  header('Location: adminpage.php');
  exit();

}else {
  echo "Du har angivit fel e-post eller lösenord, eller saknar behörighet för att logga in";
}
 ?>
