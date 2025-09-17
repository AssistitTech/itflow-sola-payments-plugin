-- Example migration: add settings table for Sola Payments plugin (optional)
CREATE TABLE IF NOT EXISTS sola_plugin_settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    setting_key VARCHAR(100) NOT NULL,
    setting_value TEXT NOT NULL,
    UNIQUE KEY (setting_key)
);