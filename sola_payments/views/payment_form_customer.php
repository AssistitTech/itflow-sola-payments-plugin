<?php
/**
 * Customer Payment Form (only save card, no charge)
 */
?>
<form method="POST" action="">
    <h4>Save Card for Future Payments</h4>
    <input type="hidden" name="sola_payments_action" value="save_card">
    <input type="hidden" name="invoice_id" value="<?= htmlspecialchars($invoice_id) ?>">
    <div>
        <label>Card Number:</label>
        <input type="text" name="card_number" maxlength="19" required>
    </div>
    <div>
        <label>Expiry (MM/YY):</label>
        <input type="text" name="expiry" maxlength="5" required>
    </div>
    <div>
        <label>CVV:</label>
        <input type="text" name="cvv" maxlength="4" required>
    </div>
    <div>
        <label>Name on Card:</label>
        <input type="text" name="card_name" required>
    </div>
    <button type="submit">Save Card</button>
</form>