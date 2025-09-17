<?php
require_once '../includes/db_connect.php';
require_once '../plugins/sola_payments/sola_payments_api.php';

$provider = sola_get_provider($mysqli);

if (!$provider['payment_provider_public_key']) {
    echo "<div class='alert alert-danger'>Sola Payments API credentials are not set. Please configure them in Admin &gt; Payment Providers.</div>";
} else {
    echo "<div>Sola Payments is configured and ready.</div>";
    // List cards/etc here if you add that logic in the future
}
?>