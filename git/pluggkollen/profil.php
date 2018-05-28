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
      <li><a class="active" href="firstpage.php">Hem</a></li>
      <li> <a href="message.php">Meddelande</a></li>
    </ul>
  </div>
    <?php
    include 'connect.php';

      $profilquery = $conn->query("SELECT DISTINCT namn, epost, u.personnummer, anvtyp FROM kurs k
      JOIN anv_kurs ak
      ON k.kurskod = ak.kurskod
      JOIN user u
      ON ak.personnummer = u.personnummer
      WHERE epost = '$username' OR u.personnummer = '$username';");

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
      echo '<h2> Slutförda kurser </h2>';
      while($row = $profilkursquery->fetch_assoc())
      {
        $universitet = $row['universitet'];
        $kursnamn = $row['kursnamn'];
        $datum = $row['datum'];

        echo "<div class = 'about'>  Kursnamn: $kursnamn </br> Universitet: $universitet </br> Slutförd: $datum </br>
        </div>";
      }
     ?>

     <!-- <p> Önskar du att bli mentor? </p>
     <form>
       <div>
         <input type="checkbox" id="blimentor" name="blimentor" value="bli mentor">
         <label for="subscribeNews">Bli mentor</label>
       </div>
       <div>
         <button type="submit">Bli mentor!</button>
       </div>
     </form> -->
    <!-- <div class="footer">
    </div> -->
  </body>
</html>
