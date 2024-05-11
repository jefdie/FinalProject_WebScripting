<?php
require 'autoload.php';

// Set up PayPal API credentials - Looking into it
$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'CLIENT_ID',     // Replace with your PayPal client ID - working on processing the ID
        'CLIENT_SECRET'  // Replace with your PayPal client secret
    )
);

// Retrieve the payment
$amount = $_POST['amount'];
$currency = $_POST['currency'];

// Create a payment 
$payment = new \PayPal\Api\Payment();
$payment->setIntent('sale')
    ->setPayer(
        new \PayPal\Api\Payer([
            'payment_method' => 'paypal'
        ])
    )
    ->setTransactions([
        new \PayPal\Api\Transaction([
            'amount' => [
                'total' => $amount,
                'currency' => $currency
            ]
        ])
    ])
    ->setRedirectUrls(
        new \PayPal\Api\RedirectUrls([
            'return_url' => 'http://thankyouforshopping.php',   // Redirect URL after successful payment
            'cancel_url' => 'http://thankyoushopping/cancel.php'     // Redirect URL after canceled payment
        ])
    );

// Create the payment and get approval URL
try {
    $payment->create($apiContext);
    $approvalUrl = $payment->getApprovalLink();
    header("Location: $approvalUrl");
    exit();
} catch (\PayPal\Exception\PayPalConnectionException $e) {
    echo $e->getMessage();
}
?>
