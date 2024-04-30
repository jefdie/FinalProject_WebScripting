<?php
// Database connection parameters
$host = 'localhost';
$dbname = 'groceries';
$username = 'username';
$password = 'password';

try {
    // Connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare and execute SQL query
    $stmt = $pdo->query("SELECT * FROM babystuff");
    
    // Fetch data
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Process and display data
    if ($data) {
        foreach ($data as $row) {
            echo ", Diapers: " . $row['diapers'] . ", Wipes: " . $row['wipes'] . "<br>";
              // Add more columns as needed
        }
    } else {
        echo "No records found.";
    }
} catch (PDOException $e) {
    die("Error: Could not connect. " . $e->getMessage());
}
?>

<a href="index.php"><button>Go to Main Page</button></a>
