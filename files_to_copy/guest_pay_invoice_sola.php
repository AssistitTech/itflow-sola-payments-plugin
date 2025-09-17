<?php
require_once '../includes/db_connect.php'; // Or whatever ITFlow uses for DB
require_once '../plugins/sola_payments/sola_payments_api.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = $_POST['amount'];
    $currency = $_POST['currency'];
    $card_info = $_POST['card']; // You'd want to handle this securely

    $result = sola_payments_charge($amount, $currency, $card_info, $mysqli);

    if ($result['status'] === 'success') {
        echo "<div class='alert alert-success'>Payment successful! Transaction: " . $result['transaction_id'] . "</div>";
    } else {
        echo "<div class='alert alert-danger'>" . htmlspecialchars($result['message']) . "</div>";
    }
}
?>
<form method="post" id="sola-payment-form">
    <input type="text" name="amount" placeholder="Amount" required>
    <input type="text" name="currency" placeholder="Currency" value="USD" required>
    <input type="text" name="card" placeholder="Card Info (demo)">
    <button type="submit">Pay with Sola</button>
</form>