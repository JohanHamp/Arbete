<?php
  session_start();
  if(!isset($_SESSION['inlogged'])){
    header("Location:Login.php");
  }
  else
  {
    $username = $_SESSION['username'];
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
      <li ><a href="logoutprocess.php">Logga ut <i><?php echo $username?></i></a></li>
    </ul>
  </div>
  <div class="middle">
    <div class="searchbardiv">
      <form name="search" method = "POST">
        <h2> Söka på en kurs eller ett program för att hitta en mentor </h2>
        <input type="text" placeholder="Sök på en kurs eller ett program..." id="searchbar" name="searchbar">
        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i>
        </button>
      </form>
        <?php
        //sök processen
        include 'connect.php';
        include 'rewardsprocess.php';

        if (isset($_POST['searchbar'])){

          $search = $_POST['searchbar'];

          $searchquery = $conn->query("SELECT namn, universitet, epost FROM kurs k
          JOIN anv_kurs ak
          ON k.kurskod = ak.kurskod
          JOIN user u
          ON ak.personnummer = u.personnummer
          WHERE k.kursnamn = '$search' AND u.anvtyp = 'mentor' AND NOT (epost = '$username' OR u.personnummer = '$username');");

          $searchqueryprogram = $conn->query("SELECT namn, universitet, epost FROM program p
          JOIN anv_program ap
          ON p.programkod = ap.programkod
          JOIN user u
          ON ap.personnummer = u.personnummer
          WHERE p.programnamn = '$search' AND u.anvtyp = 'mentor' AND NOT (epost = '$username' OR u.personnummer = '$username');");

          if ($searchquery->num_rows > 0)
          {
              echo "<p> Följande har läst $search: </p>";
              while($row = $searchquery->fetch_assoc())
              {
                $namn = $row['namn'];
                $email = $row['epost'];
                $omdome = avgFunction($email);
                $universitet = $row['universitet'];

                echo "<div class = 'mentor'> $namn </br> Omdöme: $omdome </br> Universitet: $universitet </br>
                <form name='mentorknappen' action='SendMessageProcess.php' method='POST'>
                <input type='submit' name='FkreceiverId' value='Ta kontakt med $namn' id='mentorknappen'>
                <input type='hidden' name='message' value='$username vill ta kontakt med dig!'>
                <input type='hidden' name='kontakt' value='$email'>
                </form>
                </div>";
              }

          } else if ($searchqueryprogram->num_rows > 0){

                echo "<p> Följande har läst $search: </p>";
                while($row = $searchqueryprogram->fetch_assoc())
                {
                  $namn = $row['namn'];
                  $email = $row['epost'];
                  $omdome = avgFunction($email);
                  $universitet = $row['universitet'];

                  echo "<div class = 'mentor'> $namn </br> Omdöme: $omdome </br> Universitet: $universitet </br>
                  <form name='mentorknappen' action='SendMessageProcess.php' method='POST'>
                  <input type='submit' name='FkreceiverId' value='Ta kontakt med $namn' id='mentorknappen'>
                  <input type='hidden' name='message' value='$username vill ta kontakt med dig!'>
                  <input type='hidden' name='kontakt' value='$email'>
                  </form>
                  </div>";
                }
          }
          else
            {
              echo " </br> Inga mentorer hittades!";
            }
        }
         ?>
      </div>
    </div>
    <div class="footer">
    </div>
  </body>
</html>
