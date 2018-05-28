<?php
  session_start();
  if(!isset($_SESSION['inloggedadmin'])){
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
    <title> Registrera dig! </title>
    <link rel="stylesheet" href="css/main.css" type="text/css" />
    <script src="assets/js/main.js"></script>
  </head>
  <body>
    <h1> Lägg till en ny användare: </h1>
    <form name="registration" method="POST" onsubmit="" action="addnewuserprocess.php">
        <label for="namn"> Namn: </label><br/>
        <input type="text" id="namn" name="namn"><br/>
        <label for="epost"> E-postadress: </label><br/>
        <input type="text" id="epost" name="epost"><br/>
        <label for="personnummer"> Personnummer (6 siffror) </label><br/>
        <input type="text" id="personnummer" name="personnummer"><br/>
        <label for="password"> Lösenord </label><br/>
        <input type="password" id="password" name="password"><br/><br/>
        <label for="anvtyp"> Användartyp </label><br/>
        <input type="text" id="anvtyp" name="anvtyp"><br/><br/>
        <input type="submit" value="Lägg till!" id="skicka">
    </form>
  </body>
</html>
