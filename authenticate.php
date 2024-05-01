<?php

session_start();


// Check if user is already logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    // Redirect to main page
    header("location: search.php");
exit;
    
}

// Database connection parameters
$host = 'localhost';
$dbname = 'credentials';
$username = 'username';
$password = 'password';

// Attempt database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: Could not connect. " . $e->getMessage());
}




// Define error variables
$username_error = $password_error = $login_error = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate username
    if (empty($_POST['username'])) {
        $username_error = 'Please enter your username.';
    } else {
        $username = $_POST['username'];
    }

    // Validate password
    if (empty($_POST['password'])) {
        $password_error = 'Please enter your password.';
    } else {
        $password = $_POST['password'];
    }

    // If username and password are provided, attempt login
    if (!empty($username) && !empty($password)) {
        try {
            // Prepare SQL statement to fetch user from database
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verify password
            if ($user && password_verify($password, $user['password'])) {
                // Authentication successful, set session variables and redirect to dashboard
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header('Location: login.php');
                exit;
            } else {
                // Authentication failed, display error message
                $login_error = 'Invalid username or password. Please try again.';
            }
        } catch (PDOException $e) {
            die("Error: Could not execute query. " . $e->getMessage());
        }
    }
}

// Start session
session_start();

// Set session variables
$_SESSION["loggedin"] = true;

// Redirect to main page
header("location: search.php");
exit;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Welcome To</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="<?php echo isset($username) ? $username : ''; ?>">
            <span class="error"><?php echo $username_error; ?></span>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
            <span class="error"><?php echo $password_error; ?></span>
        </div>
        <div>
            <input type="submit" value="Login">
        </div>
        <p class="error"><?php echo $login_error; ?></p>
    </form>
</body>
</html>


