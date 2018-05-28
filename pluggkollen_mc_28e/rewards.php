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
    <title> Pluggkollen </title>
    <link rel="stylesheet" href="css/main.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>
  <body>
    <div class="header">
      <h1> Belöningar</h1>
    <ul>
      <li><a href="firstpage.php">Hem</a></li>
      <li><a href="profil.php">Profil</a></li>
      <li><a class="active" href="rewards.php">Belöningar</a></li>
      <li><a href="meddelanden">Meddelanden</a></li>
      <li ><a href="logoutprocess.php">Logga ut <i><?php echo $username?></i></a></li>
    </ul>
  </div>
  <?php $average = avgFunction($username); ?>
  <div class="rewards">
  
    <div class="textreward"> 
    Hej <strong><?php echo $username; ?></strong>! Du har "<strong><?php echo countFunction() ?></strong>" st omdömen 
    och ditt genomsnittliga omdöme är "<strong><?php echo $average; ?></strong>". 
    <em>Så länge du håller ett snittomdöme över 3,5</em> så kan du få belöningar för alla personer du hjälpt. 
    Kolla i belöningstabellen om du har fått tillgång till några särskilda belöningar! <br>
    
    <br>
    <table class="rewardsstriped rewardstabell">
      <tr>
        <b>Belöningstabellen:</b>
      <tr>
        <th>Antal omdömen</th>
        <th>Belöning</th>
      </tr>
      <tr>
        <td>Var 5:e</td>
        <td>Kaffekupong på pressbyrån</td>
      </tr>
      <tr>
        <td>Var 10:e</td>
        <td>En kaffe och bulle på pressbyrån.</td>
      </tr>
      <tr>
        <td>Var 15:e</td>
        <td>En varmkorv på pressbyrån.</td>
      </tr>
      <tr>
        <td>Var 20:e</td>
        <td>En biobiljett.</td>
      </tr>
      <tr>
        <td>Var 100:e</td>
        <td>Resa med SJ från valfri stad i Sverige till Köpenhamn.</td>
      </tr>
    </table>
    </div>
        
    </div>
  

    <div class="footer">
    </div>
  </body>
</html>
