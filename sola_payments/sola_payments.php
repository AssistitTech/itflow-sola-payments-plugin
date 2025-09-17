<?php
/**
 * Sola Payments/Cardknox Plugin for ITFlow
 * Main integration logic.
 */

class SolaPayments {

    // Load plugin config
    public static function getConfig() {
        $file = __DIR__ . '/config.php';
        if (!file_exists($file)) {
            return [
                'xKey' => '',
                'ifields' => '',
                'enabled' => false,
                'customer_visible' => false,
                'sandbox' => true,
            ];
        }
        return include $file;
    }

    // Save plugin config
    public static function saveConfig($data) {
        $content = "<?php\nreturn " . var_export($data, true) . ";\n";
        file_put_contents(__DIR__ . '/config.php', $content);
    }

    // Show payment form (customer or tech)
    public static function renderPaymentForm($invoice_id, $is_admin = false) {
        $config = self::getConfig();
        if (!$config['enabled']) {
            echo "<p>Sola Payments integration is disabled.</p>";
            return;
        }
        if (!$is_admin && !$config['customer_visible']) {
            // Don't show to customer
            return;
        }
        if ($is_admin) {
            include __DIR__ . '/views/payment_form_admin.php';
        } else {
            include __DIR__ . '/views/payment_form_customer.php';
        }
    }

    // Process payment (dummy logic for now)
    public static function processPayment($invoice_id, $card_data, $is_admin = false) {
        // TODO: Implement actual Sola/Cardknox API call here.
        // Example: $result = SolaApi::charge($card_data, $invoice_id);
        return [
            'success' => false,
            'message' => 'Payment gateway not yet implemented'
        ];
    }

    // Admin settings form
    public static function renderSettingsForm() {
        $config = self::getConfig();
        include __DIR__ . '/views/settings_form.php';
    }

    // Process settings save
    public static function processSettingsSave($post) {
        $data = [
            'xKey' => trim($post['xKey'] ?? ''),
            'ifields' => trim($post['ifields'] ?? ''),
            'enabled' => !empty($post['enabled']),
            'customer_visible' => !empty($post['customer_visible']),
            'sandbox' => !empty($post['sandbox']),
        ];
        self::saveConfig($data);
        echo "<div class='alert alert-success'>Sola Payments settings saved!</div>";
    }
}