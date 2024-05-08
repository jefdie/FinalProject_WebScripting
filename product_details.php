<?php
// Include the database connection file
require_once "db.php";

// Check if the product ID is provided in the URL
if(isset($_GET["id"])) {
    // Retrieve the product ID from the URL
    $product_id = $_GET["id"];

    // Prepare a SQL statement to select the product details from the database
    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the product exists
    if($result->num_rows > 0) {
        // Fetch the product details
        $product = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product["name"]; ?> - Product Details</title>
    <!-- Include CSS stylesheets and other necessary resources -->
</head>
<body>
    <!-- Include header and navigation -->
    <?php include "includes/header.php"; ?>

    <!-- Product details section -->
    <div class="container">
        <h2><?php echo $product["name"]; ?></h2>
        <p><strong>Price:</strong> $<?php echo $product["price"]; ?></p>
        <p><strong>Description:</strong> <?php echo $product["description"]; ?></p>
        <!-- Add more details here such as images, specifications, etc. -->
    </div>

    <!-- Include footer -->
    <?php include "includes/footer.php"; ?>
</body>
</html>
<?php
    } else {
        // Product not found, display an error message or redirect to an error page
        echo "Product not found.";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect to the products page if the product ID is not provided
    header("location: index.php");
    exit;
}
?>
