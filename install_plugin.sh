#!/bin/bash
set -e

echo "=== Sola Payments Plugin Installer ==="
read -p "Enter the full path to your ITFlow installation: " ITFLOW_PATH

# 1. Copy plugin logic
cp -r sola_payments "$ITFLOW_PATH/plugins/"

# 2. Patch ITFlow core files
patch "$ITFLOW_PATH/admin/modals/payment_provider/payment_provider_add.php" patches/admin__modals__payment_provider__payment_provider_add.patch
patch "$ITFLOW_PATH/admin/post/payment_provider.php" patches/admin__post__payment_provider.patch
patch "$ITFLOW_PATH/guest/guest_pay_invoice_stripe.php" patches/guest__guest_pay_invoice.patch
patch "$ITFLOW_PATH/client/saved_payment_methods.php" patches/client__saved_payment_methods.patch

# 3. Copy new payment handler files
cp files_to_copy/guest_pay_invoice_sola.php "$ITFLOW_PATH/guest/"
cp files_to_copy/saved_payment_methods_sola.php "$ITFLOW_PATH/client/"

# 4. Apply database changes
mysql -u root -p itflow < db/sola_payments.sql

echo "=== Sola Payments Plugin Installed! ==="
echo "Visit Admin > Payment Providers to configure Sola Payments."