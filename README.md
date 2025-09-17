# Sola Payments/Cardknox Plugin for ITFlow

## Overview

This repository contains a modular plugin for adding Sola Payments (Cardknox) card processing to ITFlow, including:

- Customer and technician/admin payment forms
- Admin settings (API keys, enable/disable, customer visibility)
- Automated installer for easy integration into an ITFlow instance

## Installation

1. Clone this repo:
    ```
    git clone https://github.com/AssistitTech/itflow-sola-payments-plugin.git
    cd itflow-sola-payments-plugin
    ```
2. Run the installer:
    ```
    bash install_plugin.sh
    ```
    - The script will ask for the path to your ITFlow installation.

## Updating

Rerun `install_plugin.sh` after pulling updates—core patches will be re-applied if needed.

## Uninstall

Delete the plugin directory from `ITFlow/plugins/sola_payments/` and revert any core changes if needed.

---