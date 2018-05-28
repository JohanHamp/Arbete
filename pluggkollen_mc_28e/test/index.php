<!DOCTYPE html>
<html>
<head>
</head>
<body>

<div>Ge omdöme:
<form action="" name="person" method="post">
1<input type="radio" name="betyg" value="1"/>
2<input type="radio" name="betyg" value="2"/>
3<input type="radio" name="betyg" value="3"/>
4<input type="radio" name="betyg" value="4"/>
5<input type="radio" name="betyg" value="5"/>
<input type="submit" value=" Skicka " name="submit"/>
</form>


<?php
if(isset($_POST["submit"])){
$hostname='localhost';
$username='ckeisu';
$password='nets2band';
$dbname = 'pluggkollen';
$tablename = 'omdome';

try {
$dbh = new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO $tablename (rating, username)
VALUES ('".$_POST["betyg"]."','".$_POST["username"]."')";
if ($dbh->query($sql)) {
echo "<script type= 'text/javascript'>alert('Tack för ditt omdöme!');</script>";
}
else{
echo "<script type= 'text/javascript'>alert('Något gick fel med att ge omdöme. Försök igen senare.');</script>";
}

$dbh = null;
}
catch(PDOException $e)
{
echo $e->getMessage();
}

}
?>

</body>
</html>