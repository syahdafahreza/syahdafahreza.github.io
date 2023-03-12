<?php
$servername = "localhost";
$username = "epiz_33317858";
$password = "aRodYdr6aMF7L";
$dbname = "np";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
$sql = "SELECT * from notes";
$result = $conn->query($sql);

if ($result) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. "title: " . $row["title"]."<br>";
  }
} else {
  echo "0 results";
}
?>