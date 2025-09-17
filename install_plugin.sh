#!/bin/bash
set -e

echo "=== Sola Payments Plugin Installer ==="
read -p "Enter the full path to your ITFlow installation: " ITFLOW_PATH

cp -r sola_payments "$ITFLOW_PATH/plugins/"
patch "$ITFLOW_PATH/admin/modals/payment_provider/payment_provider_add.php" patches/admin__modals__payment_provider__payment_provider_add.patch
patch "$ITFLOW_PATH/admin/post/payment_provider.php" patches/admin__post__payment_provider.patch

cp files_to_copy/guest_pay_invoice_sola.php "$ITFLOW_PATH/guest/"
cp files_to_copy/saved_payment_methods_sola.php "$ITFLOW_PATH/client/"

echo "Done! Go to Admin > Payment Providers and configure Sola Payments."