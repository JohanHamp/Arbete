<!DOCTYPE html>
<html>
  <head>
    <title> Studentchatten </title>
    <link rel="stylesheet" href="css/main.css" type="text/css" />
  </head>
  <body>
  <div class='login'>
    <form name="login" method="POST" onsubmit="" action="adminloginprocess.php">
        <label for="username"> Personnummer eller e-postadress </label><br/>
        <input type="text" id="username" name="username"><br/>
        <label for="password"> Lösenord </label><br/>
        <input type="password" id="password" name="password"><br/><br/>
        <input type="submit" value="Logga in" id="skicka">
    </form>
  </div>
  </body>
</html>
