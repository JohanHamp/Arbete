<?php
session_start();
//är användaren inloggad?
if(!isset($_SESSION['inlogged']))
{
 header('Location:loggain.php');
}
else {
    $username = $_SESSION['username'];
}



if(isset($_POST["submit"])){
    $dbname = 'pluggkollen';
    $tablename = 'omdome';

try {
    $conn = new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO $tablename (rating, personnummer)
    VALUES ('".$_POST["betyg"]."','".$_POST["personnummer"]."')";

if ($conn->query($sql)) {
    echo "<script type= 'text/javascript'>alert('Tack för ditt omdöme!');</script>";
}
else{
    echo "<script type= 'text/javascript'>alert('Något gick fel med att ge omdöme. Försök igen senare.');</script>";
}

$conn = null;
}
catch(PDOException $e)
{
    echo $e->getMessage();
}

}
?>