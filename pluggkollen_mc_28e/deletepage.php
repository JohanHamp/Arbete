<?php
include 'connect.php';


$pnr = $_GET['personnummer'];

$sqlcourse = "DELETE FROM anv_kurs WHERE personnummer = '$pnr';";
$sql = "DELETE FROM user WHERE personnummer ='$pnr';";
$resultat1 = mysqli_query($conn,$sqlcourse);
$result =mysqli_query($conn,$sql);


header('Location:adminpage.php');

echo "Borttagen";

?>
