<?php
// require 'vendor/autoload.php';

// use Stripe\Stripe;
// use Stripe\Checkout\Session;

//Stripe::setApiKey('YOUR_STRIPE_SECRET_KEY'); // Add your Stripe Secret Key here

// Check if form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $paymentMethod = $_POST['payment_method'];
    
    if ($paymentMethod == 'stripe') {
        // Create a Stripe Checkout Session
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Sample Product',
                    ],
                    'unit_amount' => 1000,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => 'https://yourdomain.com/success.php',
            'cancel_url' => 'https://yourdomain.com/cancel.php',
        ]);

        // Redirect to Stripe checkout page
        header("Location: " . $session->url);
        exit;
    } elseif ($paymentMethod == 'paypal') {
        // Redirect to PayPal checkout (Replace YOUR_PAYPAL_LINK with actual link)
        header("Location: https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=YOUR_PAYPAL_EMAIL&item_name=Sample+Product&amount=10.00&currency_code=USD&return=https://yourdomain.com/success.php&cancel_return=https://yourdomain.com/cancel.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Payment Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }
        .payment-container {
            max-width: 400px;
            padding: 20px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .payment-options {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .payment-option {
            display: flex;
            align-items: center;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            cursor: pointer;
            transition: 0.3s;
        }
        .payment-option:hover {
            background-color: #f1f1f1;
        }
        .payment-option img {
            width: 50px;
            height: auto;
            margin-right: 10px;
        }
        .payment-option label {
            font-size: 1em;
            color: #333;
        }
        .btn-pay {
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            border: none;
            color: #fff;
            font-size: 1em;
            border-radius: 4px;
            cursor: pointer;
            transition: 0.3s;
        }
        .btn-pay:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <h2>Choose Payment Method</h2>
        <form method="POST">
            <div class="payment-options">
                <div class="payment-option">
                    <input type="radio" name="payment_method" id="stripe" value="stripe" required>
                    <img src="https://www.example.com/stripe-logo.png" alt="Stripe">
                    <label for="stripe">Pay with Credit Card (Stripe)</label>
                </div>
                <div class="payment-option">
                    <input type="radio" name="payment_method" id="paypal" value="paypal" required>
                    <img src="https://www.example.com/paypal-logo.png" alt="PayPal">
                    <label for="paypal">Pay with PayPal</label>
                </div>
            </div>
            <button type="submit" class="btn-pay">Proceed to Pay</button>
        </form>
    </div>
</body>
</html>
