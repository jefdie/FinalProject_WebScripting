<?php
    include_once "index.php";
    require_once "login.php";

    class Product
    {
        public $id, $name, $description, $price, $idstore;
        function __construct($id, $name, $description, $price, $idstore) 
        {
            $this->id = $id;
            $this->name = $name;
            $this->description = $description;
            $this->price = $price;
            $this->idstore = $idstore;
        }
    }
    
    $products = array();

    $query = "SELECT * FROM products";
    $result = $pdo->query($query);

    
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $id = htmlspecialchars($row['id']);
        $name = htmlspecialchars($row['name']);
        $description = htmlspecialchars($row['description']);
        $price = htmlspecialchars($row['price']);
        $idstore = htmlspecialchars($row['idstore']);

        $product = new Product($id, $name, $description, $price, $idstore);
        $products[$id] = $product;
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>World of Groceries</title>
    <link rel="stylesheet" type="text/css" href="assets/styles.css" />
  </head>
  <body>
    <header>
      <div class="logo">
        <a href="index.php"
          ><img src="assets/CIT336 Logo.png" width="154" height="80.7"
        /></a>
      </div>
      <input class="search" type="text" placeholder="Search..." />
      <div class="loginbutton">
        <a href="login.php" class="account"
          ><img src="assets/AccountIcon.png" width="80.7" height="80.7" />Log
          In</a
        >
      </div>
      <br />
      <h5>
        <ul>
          <li><a href="babystuff.php">Babies</a></li>
          <li><a href="Beverage.php">Beverage</a></li>
          <li><a href="Meat.php">Meat</a></li>
          <li><a href="Pets.php">Pets</a></li>
        </ul>
      </h5>
    </header>
    <main>
    <h1>Price Comparison</h1>
    <form action="search.php" method="GET">
        <input type="text" name="query" placeholder="Search for a product...">
        <button type="submit">Search</button>
    </form>

    <?php
    foreach ($products as $product) {
        echo "<div>";
        echo "<h2>" . $product->name . "</h2>";
        echo "<p>Description: " . $product->description . "</p>";
        echo "<p>Price: $" . $product->price . "<p>";
        echo "</div>";
    }
    ?>
    </main>
</body>
</html>