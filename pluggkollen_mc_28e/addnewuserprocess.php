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
    <title></title>
    <link rel="stylesheet" href="css/main.css" type="text/css" />
  </head>
  <body>
    <?php
    include 'connect.php';

    $epost = mysqli_real_escape_string($conn, $_POST['epost']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $personnummer = mysqli_real_escape_string($conn, $_POST['personnummer']);
    $namn = mysqli_real_escape_string($conn, $_POST['namn']);
    $anvtyp= mysqli_real_escape_string($conn, $_POST['anvtyp']);

    $sql = "INSERT INTO User (epost, password, namn, personnummer, anvtyp) VALUES ('".$epost."', '".$password."', '".$namn."','".$personnummer."', '".$anvtyp."')";

    $alreadyuser="SELECT * FROM User WHERE epost='$epost' OR personnummer = $personnummer";
    $ifuser= mysqli_query($conn, $alreadyuser) or die("Bad SQL: $ifuser" );

    if(mysqli_num_rows($ifuser)>=1)
       {
         echo "<h1> Användaren är redan registerad! </h1>";
         header('Location: adminpage.php');

       }
       else if ($conn->query($sql) === TRUE)
            {
              echo "<h1> Tack! Du är nu registrerad. </h1>";
              header('Location: adminpage.php');

            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
              echo "<h1> Registrationen misslyckades. Var vänlig försök igen!</h1>";
            }
    ?>

  </body>
</html>
