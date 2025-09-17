<?php
require_once '../plugins/sola_payments/sola_payments_api.php';

// Example: Handle guest invoice payment via Sola Payments
$amount = $_POST['amount'];
$currency = $_POST['currency'];
$card_info = $_POST['card'];
$api_key = "YOUR_API_KEY"; // Fetch from DB or settings
$api_secret = "YOUR_API_SECRET";

$result = sola_payments_charge($amount, $currency, $card_info, $api_key, $api_secret);

if ($result['status'] === 'success') {
    echo "Payment successful! Transaction: " . $result['transaction_id'];
} else {
    echo "Payment failed: " . $result['message'];
}
?>