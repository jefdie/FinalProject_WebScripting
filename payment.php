<!DOCTYPE html>
<html>
<head>
    <title>Payment Your Grocery Invoice</title>
</head>
<body>

<h2>Make a Payment</h2>

<form action="process_payment.php" method="POST">

    <label for="invoice">Invoice Number:</label>
    <input type="text" id="invoice" name="invoice" required><br><br>

    <label for="amount">Amount:</label>
    <input type="text" id="amount" name="amount" required><br><br>
     
    <label for="currency">Currency:</label>
    <select id="currency" name="currency" required>
        <option value="USD">USD</option>
        <option value="EUR">EUR</option>
        <!-- Add more currency options as needed -->
    </select><br><br>
    
    <button type="submit">Pay with PayPal</button>
</form>

</body>
</html>


<a href="index.php"><button>Go to Main Page</button></a>
