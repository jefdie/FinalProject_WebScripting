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
          <li><a href="Authenticate.php">Login</a></li>
          <li><a href="Beverage.php">Beverage</a></li>
          <li><a href="Babystuff.php">Babystuff</a></li>
          <li><a href="ComparePrice.php">Compare Price</a></li>
          <li><a href="Search.php">Search</a></li>
          <li><a href="Review_form.php">Review</a></li>
        </ul>
      </h5>
    </header>
    <main>
      <h1>Welcome to the World of Groceries!</h1>
      <br /><br />
      <h5>
        Check out all sorts of products from different stores to find the best
        buying option for you!
      </h5>
    </main>
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
