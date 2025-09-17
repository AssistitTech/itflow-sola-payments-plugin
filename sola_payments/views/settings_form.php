<?php
/**
 * Sola Payments Plugin Settings Form
 */
?>
<form method="POST" action="">
    <h4>Sola Payments Integration Settings</h4>
    <input type="hidden" name="sola_payments_action" value="save_settings">
    <div>
        <label>API Key (xKey):</label>
        <input type="text" name="xKey" value="<?= htmlspecialchars($config['xKey']) ?>" required>
    </div>
    <div>
        <label>iFields Key:</label>
        <input type="text" name="ifields" value="<?= htmlspecialchars($config['ifields']) ?>" required>
    </div>
    <div>
        <label>
            <input type="checkbox" name="enabled" value="1" <?= $config['enabled'] ? 'checked' : '' ?>>
            Enable Sola Payments Integration
        </label>
    </div>
    <div>
        <label>
            <input type="checkbox" name="customer_visible" value="1" <?= $config['customer_visible'] ? 'checked' : '' ?>>
            Show Payment Option to Customers
        </label>
    </div>
    <div>
        <label>
            <input type="checkbox" name="sandbox" value="1" <?= $config['sandbox'] ? 'checked' : '' ?>>
            Sandbox/Test Mode
        </label>
    </div>
    <button type="submit">Save Settings</button>
</form>