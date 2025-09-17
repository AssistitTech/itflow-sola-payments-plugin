# Sola Payments Plugin for ITFlow

## Installation

1. Clone or unzip this repo on your ITFlow server.
2. Run:
   ```bash
   sudo bash install_plugin.sh
   ```
   and follow the prompts.
3. Go to **Admin > Payment Providers** in ITFlow, select "Sola Payments," and enter your API credentials.
4. Sola Payments will now be available for invoices and saved payment methods.

## Uninstall

1. Remove Sola Payments from the payment provider table if desired.
2. Remove the `plugins/sola_payments` folder and any files you added/copied.

## Troubleshooting

- If you see patch errors, make sure you are using vanilla ITFlow files and have not modified them.
- For support, contact AssistitTech.