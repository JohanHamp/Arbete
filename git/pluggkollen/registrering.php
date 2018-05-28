<!DOCTYPE html>
<html>
  <head>
    <title> Registrera dig! </title>
    <link rel="stylesheet" href="css/main.css" type="text/css" />
    <script src="assets/js/main.js"></script>
  </head>
  <body>
    <h1> Registrer dig </h1>
    <ul>
      <li><a href="login.php">Logga in</a></li>
      <li><a href="registration.php">Registrera dig</a></li>
    </ul>
    <div> </div>
    <form name="registration" method="POST" onsubmit="" action="registreringsprocess.php">
        <label for="namn"> Namn: </label><br/>
        <input type="text" id="namn" name="namn"><br/>
        <label for="epost"> E-postadress: </label><br/>
        <input type="text" id="epost" name="epost"><br/>
        <label for="personnummer"> Personnummer (6 siffror) </label><br/>
        <input type="text" id="personnummer" name="personnummer"><br/>
        <label for="password"> Lösenord </label><br/>
        <input type="password" id="password" name="password"><br/><br/>
        <input type="submit" value="Registrera dig!" id="skicka">
    </form>
    <p> Genom att välja att registera dig godkänner du våra användarvilkor </p>
    <a href="vilkor.php">Användarvilkor</a>
  </body>
</html>
