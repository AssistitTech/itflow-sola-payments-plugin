-- Add Sola Payments as a payment provider
INSERT IGNORE INTO payment_providers (payment_provider_name, payment_provider_public_key, payment_provider_private_key, payment_provider_active)
VALUES ('Sola Payments', '', '', 0);

-- (Add any additional fields needed for Sola Payments here)