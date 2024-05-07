
<a href="index.php"><button>Go to Main Page</button></a>
<?php
// Start session
session_start();

// Check if user is logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    // Redirect to login page if user is not logged in
    header("location: login.php");
    exit;
}

// Include database connection
require_once "db.php";

// Get form data
$product_id = $_POST["idreview"]; 
//$user_id = $_SESSION["babyfood"];
$rating = $_POST["rating"];
$review = $_POST["review"];

// Prepare SQL statement to insert review into database
$sql = "INSERT INTO reviews (idreview,rating, review) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiis", $product_id, $user_id, $rating, $review);

// Execute SQL statement
if($stmt->execute()){
    // Review submitted successfully
    header("location: index.php?id=" . $product_id); // Redirect to home
    exit;
} else {
    // Error occurred
    echo "Error: " . $conn->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
