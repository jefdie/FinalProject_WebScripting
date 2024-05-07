<a href="index.php"><button>Go to Main Page</button></a>

<?php

include_once("authenticate.php");


$sql = "SELECT babyfood, diapers, wipes FROM babystuff";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  //  echo "babyfood: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
 //   echo ", Diapers: " . $row['diapers'] . ", Wipes: " . $row['wipes'] . "<br>";
    echo ", Diapers: " . $row['diapers'] . ", Wipes: " . $row['wipes'] . "<br>";

  }
} else {
  echo "0 results";
}
$conn->close();
?>,
