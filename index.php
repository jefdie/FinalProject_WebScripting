<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>World of Groceries</title>
    <link rel="stylesheet" type="text/css" href="assets/styles.css" />
    <script src="assets/filter.js" defer></script>
    <?php
      include_once("Beverage.php");
      $productCounter = 0;
    ?>
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
          <li><a href="Authenticate.php">Login</a></li>
          <li><a href="Beverage.php">Beverage</a></li>
          <li><a href="Babystuff.php">Babystuff</a></li>
          <li><a href="ComparePrice.php">Compare Price</a></li>
          <li><a href="Search.php">Search</a></li>
          <li><a href="Review_form.php">Review</a></li>
          <li><a href="payment.php">Make a Payment</a></li>
        </ul>
      </h5>
    </header>
    <main class="container shop">
      <h1>Welcome to the World of Groceries!</h1>
      <br /><br />
      <h5>
        Check out all sorts of products from different stores to find the best
        buying option for you!
      </h5>

    <div class="review">
        <form name="filterform" id="filterform">
            <input type="text" name="filter" placeholder="Search...">
            <button type="submit" name="search"><i class="fa fa-search"></i></button>
        </form>
        <?php foreach($products as $id => $product):?>
            <section class="tile review__items product">
                <img src="<?php echo $product->imageLocation; ?>" alt="<?php echo $product->name; ?>">
                <h2><?php echo $product->name; ?></h2>
                <p><?php echo $product->description; ?></p>
                <p class="price">$<?php echo $product->price; ?></p>
                <form name="phpbookform" id="phpbookform" action="" method="POST">
                    <input type="hidden" name="title" value="<?php echo $product->name; ?>">
                    <input type="hidden" name="price" value="<?php echo $product->price; ?>">
                    <input type="hidden" name="index" value="<?php echo $productCounter; ?>">
                    <button type="submit">Add to Cart</button>
                </form>
            </section>
          <?php $productCounter++; ?>
    <?php endforeach; ?>
    </div>
    <aside id="cart">
        <p id="cartSummary">
            Items: <?php echo count($_SESSION["items"]); ?><br><br>
            Total: $<?php echo $_SESSION["total"]; ?>
        </p>
        <form id="checkoutform" name="checkoutform" action="payment.php" method="POST">
            <input type="hidden" name="cart" id="cartInput" value="<?php echo implode("|", $_SESSION["items"]); ?>">
            <input type="hidden" name="total" id="totalInput" value="<?php echo $_SESSION["total"]; ?>">
            <button id="checkout">Checkout</button>
        </form>
        <form id="clearform" name="clearform" action="" method="POST">
            <button id="clearCart" name="clear" value="clear">Clear Cart</button>
        </form>

    </main>
    <br><br><br><br>
    <img src="images/targetbabystuff.jpg"><img src="images/quillbeverage.jpg"><img src="images/targetpets.jpg">
  </body>
</html>

<?php
session_start();

// Redirect user to login page if not logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION["username"]; ?>!</h1>
    <a href="logout.php">Logout</a>
</body>
</html>
