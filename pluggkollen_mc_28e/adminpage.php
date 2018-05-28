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
    <title> Pluggkollen </title>
    <link rel="stylesheet" href="css/main.css" type="text/css" />

  </head>
  <body>
    <div class="header">
      <h1> Adminsida för admin: <?php echo $username ?> </h1>
    </div>
    <a href="addnewuser.php">Lägg till en ny användare! </a>
  <div class="middle">

    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>Epost</td>
            <td>Namn</td>
            <td>personnummer</td>
            <td>Användartyp</td>
            <td>Ändra</td>
        </tr>

</body>
</html>

<?php
include 'connect.php';

$sql= "SELECT * FROM user";

$resultsearch = mysqli_query($conn, $sql);

 if($resultsearch){

       while($row = $resultsearch->fetch_assoc()) {
         echo "<tr>";       //hämtar ut en viss rad från resultcomment
         echo "<td>".$row['epost']. "</td>";
         echo "<td>".$row['namn']. "</td>";
         echo "<td>".$row['personnummer'] ."</td>";
         echo "<td>".$row['anvtyp']. "</td>";
         echo "<td>"."<a href=\"edit.php?personnummer=$row[personnummer]\">Edit</a> | <a href = \"deletepage.php?personnummer=$row[personnummer]\" onClick=\"return confirm('Are you sure you want to delete?')\"> Delete</a>";

       }
  }
    else
    {
       echo "Inga användare med det personnummret hittades";
    }

    mysqli_close($conn);
?>
    </table>
</div>
<div class="footer">
</div>
