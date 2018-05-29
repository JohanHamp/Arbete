
<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
# AVG vad är snittbetyget för $username?
function avgFunction($inputemail) {
    include 'connect.php';
    $sql = "SELECT AVG(rating) AS avgRating
    FROM omdome
    WHERE username = '$inputemail'";
    $result = $conn->query($sql);
    
  
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        return $row["avgRating"];
        }
    } else {
        echo "0 omdömen";
    }}
?>
<?php
# COUNT hur många betyg har ett givet username?
function countFunction() {
  include 'connect.php';
  $username = $_SESSION['username'];
  $sql = "SELECT COUNT(username) AS countRating
  FROM omdome
  WHERE username = '$username'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
      echo $row["countRating"];
      }
  } else {
      echo "0";
}}
?>
<?php
# ge omdome till $gradeduser
function gradeFunction($gradeduser, $grade) {
include 'connect.php';

$gradedby = $_SESSION['username'];


$sql = "INSERT INTO omdome (rating, username, rating_from)
VALUES ('$grade', '$gradeduser', '$gradedby')
IF NOT EXISTS ( SELECT username, rating_from FROM omdome
                WHERE $gradedby = $gradedby
                AND $gradeduser = $gradeduser) ";

    if ($conn->query($sql) === TRUE) {
        return $grademssage = "Omdöme skickat";                
    }
    else {
        return $grademessage = "Du har redan gett ett omdöme";   
    }
}
?>


</body>
</html>
