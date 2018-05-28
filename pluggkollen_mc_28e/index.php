<!DOCTYPE html>
<html>
  <head>
    <title> Studentchatten </title>
    <link rel="stylesheet" href="css/main.css" type="text/css" />
    <script src="js/scripts.js"></script>
  </head>
  <body>
    <div class="header">
    <h1> Välkommen till pluggkollen! </h1>
  </div>

    <div class="frontpage">

    <div class='loginlink'>
    <form name="login" method="POST" onsubmit="" action="loginprocess.php">
        <label for="username"> Personnummer eller e-postadress </label><br/>
        <input class="logintext" type="text" id="username" name="username"><br/>
        <label for="password"> Lösenord </label><br/>
        <input class="logintext" type="password" id="password" name="password"><br/><br/>
        <input class="loginbutton" type="submit" value="Logga in" id="skicka">
    </form>
    <form name="registrationbutton" onsubmit="return buttonPopup()" action="">
      <input type="submit" value="Registrera dig!" class="loginbutton" id="registrationbutton">
    </form>
    </div>

    <div class="frontpagetext">
      Pluggkollen är för dig som har funderingar eller frågor du vill ställa till studenter på
      de kurser eller program du är intresserad av. Det är kopplat till Antagning.se och fungerar
      som så att du loggar in och sedan söker på de kurser du är intresserad av. På varje kurs
      kan du sedan se om det finns några mentorer att kontakta (alltså studenter som läst kursen). 
      Givetvis kan även du bli mentor om du redan har färdiga kurser, så länge de inte är äldre än 2 år!

      Är du inte redan medlem på Antagning.se är du välkommen att registrera dig till höger 
      (du blir vidarebefodrad till Antagning.se).
    </div>
    </div>
    </div>
    <div class="footer">
    </div>
  </body>
</html>
