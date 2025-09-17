<?php
// Sola Payments API Integration for ITFlow

function sola_get_provider($mysqli) {
    $sql = mysqli_query($mysqli, "SELECT * FROM payment_providers WHERE payment_provider_name = 'Sola Payments' LIMIT 1");
    return mysqli_fetch_array($sql);
}

function sola_payments_charge($amount, $currency, $card_info, $mysqli) {
    $provider = sola_get_provider($mysqli);

    $api_key = $provider['payment_provider_public_key'] ?? '';
    $api_secret = $provider['payment_provider_private_key'] ?? '';

    if (!$api_key || !$api_secret) {
        return [
            "status" => "error",
            "message" => "Sola Payments API credentials are not set. Please configure them in Admin > Payment Providers."
        ];
    }

    // TODO: Replace with real API request
    // Simulate a success for now
    return [
        "status" => "success",
        "transaction_id" => uniqid("sola_"),
        "message" => "Payment processed successfully (demo mode)"
    ];
}
?>