<?php
// Kolla om användaren är inloggad, och då får denna tillgång till index.php, säkerhetskoll
session_start();
if(!isset($_SESSION['inlogged'])){
  header("Location:login.php");
}
else
{
  $username = $_SESSION['username'];
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title> Profil </title>
    <link rel="stylesheet" href="css/main.css" type="text/css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

  </head>
  <body>
    <div class="header">
      <h1> Användarprofil </h1>
    <ul>
      <li><a href="firstpage.php">Hem</a></li>
      <li><a class="active" href="profil.php">Profil</a></li>
      <li><a href="rewards.php">Belöningar</a></li>
      <li><a href="message.php">Meddelanden</a></li>
      <li ><a href="logoutprocess.php">Logga ut <i><?php echo $username?></i></a></li>
    </ul>
  </div>
    <?php
    include 'connect.php';

      $profilquery = $conn->query("SELECT namn, epost, personnummer, anvtyp FROM user
      WHERE epost = '$username' OR personnummer = '$username';");

          while($row = $profilquery->fetch_assoc())
          {
            $namn = $row['namn'];
            $epost = $row['epost'];
            $personnummer = $row['personnummer'];
            $anvtyp = $row['anvtyp'];

            echo "<div class = 'about'> <h2> Din profil </h2> Namn: $namn </br> E-post: $epost </br> Personnummer: $personnummer </br> Konto: $anvtyp </br>
            </div>";
          }

      $profilkursquery = $conn->query("SELECT universitet, kursnamn, datum FROM kurs k
      JOIN anv_kurs ak
      ON k.kurskod = ak.kurskod
      JOIN user u
      ON ak.personnummer = u.personnummer
      WHERE epost = '$username' OR u.personnummer = '$username';
      ");

      $profilprogramquery = $conn->query("SELECT universitet, programnamn FROM program p
      JOIN anv_program ap
      ON p.programkod = ap.programkod
      JOIN user u
      ON ap.personnummer = u.personnummer
      WHERE epost = '$username' OR u.personnummer = '$username';");

      echo '<h2> Slutförda kurser </h2>';
      while($row = $profilkursquery->fetch_assoc())
      {
        $universitet = $row['universitet'];
        $kursnamn = $row['kursnamn'];
        $datum = $row['datum'];

        echo "<div class = 'about'>  Kursnamn: $kursnamn </br> Universitet: $universitet </br> Slutförd: $datum </br>
        </div>";
      }
      echo '<h2> Slutförda program </h2>';
      while($row = $profilprogramquery->fetch_assoc())
      {
        $universitet = $row['universitet'];
        $programnamn = $row['programnamn'];

        echo "<div class = 'about'>  Program: $programnamn </br> Universitet: $universitet </br>
        </div>";
      }
     ?>

     <?php
     $ifsokande = $conn->query("SELECT * FROM user WHERE anvtyp='sokande' AND personnummer =$username OR epost = $username;");
     $num = mysqli_num_rows($ifsokande);
     if($num > 0){

       echo '<form action="mentorprocess.php" method="POST">
         <label for="mentorcheckbox"> Vill du bli mentor?  </label>
         <input type="checkbox" name="mentorcheckbox" id= "mentorcheckbox" value="A" /> <br />
         <input type="submit" value="Bli mentor" id="mentorprocessbutton">
       </form>';

     }
?>
  </body>
</html>
