<?php
// Database connection parameters
$host = 'localhost';
$dbname = 'groceries';
$username = 'username';
$password = 'password';

// Create connection
$conn = new mysqli($host,$username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve search query from GET parameter
$query = isset($_GET['query']) ? $_GET['query'] : '';

// Prepare SQL statement to search for items
$sql = "SELECT * FROM babystuff WHERE name LIKE '%$query%'";
$result = $conn->query($sql);

if ($result) {
    // Output data of each row
//    foreach ($data as $row) {
    while($row = $result->fetch_assoc()) {
        echo ", Diapers: " . $row['diapers'] . ", Wipes: " . $row['wipes'] . "<br>";
        // Output other item details as needed
    }
} else {
    echo "No results found";
}

// Close connection
$conn->close();
?>



<a href="index.php"><button>Go to Main Page</button></a>
