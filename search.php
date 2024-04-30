<!-- search.php -->
<?php
// Connect to the database
$pdo = new PDO("mysql:host=localhost;dbname=your_database", "username", "password");

// Retrieve search query from GET parameter
$query = isset($_GET['query']) ? $_GET['query'] : '';

// Prepare SQL query to search for products
$stmt = $pdo->prepare("SELECT * FROM products WHERE name LIKE ?");
$stmt->execute(["%$query%"]);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Display search results
foreach ($products as $product) {
    echo "<h2>{$product['name']}</h2>";
    echo "<p>Price: {$product['price']}</p>";
    echo "<p>Store: {$product['store']}</p>";
}
?>
