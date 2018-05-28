<?php
session_start();
if(!isset($_SESSION['inlogged']))
{
  header('Location:login.php');
}
else {
  $username = $_SESSION['username'];
}

?>


<!DOCTYPE html>
<html>
<head>
  <title> Medelanden </title>
  <link rel="stylesheet" href="css/main.css" type="text/css" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
  <div class="header">
    <h1> Meddelanden </h1>
    <ul>
      <li><a class="active" href="firstpage.php">Hem</a></li>
      <li><a href="profil.php">Profil</a></li>
    </ul>
  </div>

  <div class="Kontakter">
    <h2> Kontakter </h2>
    <br>
  </div>



  <div class="footer">




    <div class="chatbox">
      <div class="chatlogs">

        <?php
        include 'connect.php';



        $sql = "SELECT Message, FKsenderId FROM messages WHERE (FKsenderId = '$username') OR (FkreceiverId = '$username')";

        $result = $conn->query($sql);

        if ($result ->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            ?>
            <div class="chat receiver">
              <div class="user-photo"><?php echo $row['FKsenderId'] ?></div>
              <p class="chat-message"><?php echo $row['Message']  ?></p>
            </div>

            <?php
          }
        } else {echo "0 messages";}
        ?>

        </div>
      </div>






      <form name="Skicka" method="POST" onsubmit="" action="SendMessageProcess.php">
        <textarea id="message" name="message" rows="10" cols="40">Skriv ditt meddelande!</textarea>
        <textarea id="kontakt" name="kontakt" rows="1" cols="25"> skriv kontakt här! </textarea>
        <input type="submit" value="skicka" id="skicka">
      </form>
    </div>



  </body>
  </html>
