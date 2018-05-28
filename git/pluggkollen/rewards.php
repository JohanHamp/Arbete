<?php
//startar en session.
session_start();
// Kolla om användaren är inloggad, och då får denna tillgång till index.php, säkerhetskoll
if(!isset($_SESSION['inlogged']))
{
 header('Location:login.php');
}
else {
  $username = $_SESSION['username'];
  include 'rewardsprocess.php';
}
?>


<!DOCTYPE html>
<html>
  <head>
    <title> Studentchatten </title>
    <link rel="stylesheet" href="css/main.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>
  <body>
    <div class="header">
      <h1> Pluggkollen <?php echo $username  ?></h1>
    <ul>
      <li><a class="active" href="firstpage.php">Hem</a></li>
      <li><a href="profil.php">Profil</a></li>
      <li><a href="rewards.php">Belöningar</a></li>
      <li><a href="mentorskap.php">Mentorskap</a></li>
    </ul>
  </div>
    <div class="middle">
    Hej <?php echo $username; ?>! Du har "<?php echo countFunction() ?>" st omdömen 
    och ditt genomsnittliga omdöme är "<?php echo avgFunction() ?>". 


    </div>

    <div class="footer">
    </div>
  </body>
</html>
