<?php
# AVG vad är snittbetyget för $username?
function avgFunction() {
    include 'connect.php';
    $username = $_SESSION['username'];
    $sql = "SELECT AVG(rating) AS avgRating
    FROM omdome
    WHERE username = '$username'";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        echo $row["avgRating"];
        }
    } else {
        echo "Du har inga omdömen ännu!";
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
