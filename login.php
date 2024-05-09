<a href="index.php"><button>Go to Main Page</button></a>

<?php

//include_once("authenticate.php");




//$sql = "SELECT babyfood, diapers, wipes FROM babystuff";
//$result = $conn->query($sql);

//if ($result->num_rows > 0) {
  // output data of each row
  //while($row = $result->fetch_assoc()) {
  //  echo "babyfood: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
 //   echo ", Diapers: " . $row['diapers'] . ", Wipes: " . $row['wipes'] . "<br>";
    //echo ", Diapers: " . $row['diapers'] . ", Wipes: " . $row['wipes'] . "<br>";

  //}
//} else {
//  echo "0 results";/
//}
//$conn->close();


?>,
<?php
session_start();

// Check if user is already logged in, redirect to index page if true
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}

// Check if form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check your authentication logic here, for example:
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate username and password (replace with your authentication logic)
    if($username === "customer" && $password === "password"){
        // Start session and store user information
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;

        // Redirect user to index page
        header("location: index.php");
        exit;
    } else {
        $error = "Invalid username or password. Credentials are customer / password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">Login</button>
    </form>
    <?php if(isset($error)) echo "<p>$error</p>"; ?>
</body>
</html>
