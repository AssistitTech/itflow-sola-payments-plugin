#!/bin/bash

# Sola Payments Plugin Installer for ITFlow
# -----------------------------------------
# - Copies plugin files to ITFlow plugins directory
# - Applies minimal core changes via patch
# - Runs SQL migration if needed

PLUGIN_NAME="sola_payments"
PLUGIN_SRC_DIR="$(pwd)/$PLUGIN_NAME"
PATCH_DIR="$(pwd)/patches"
MIGRATION="$(pwd)/$PLUGIN_NAME/migrations/2025_09_17_add_sola_settings.sql"

echo "=== Sola Payments Plugin Installer ==="
echo
read -p "Enter the full path to your ITFlow installation: " ITFLOW_DIR

# Validate ITFlow directory
if [[ ! -d "$ITFLOW_DIR/plugins" ]]; then
  echo "ERROR: '$ITFLOW_DIR/plugins' does not exist. Please check your path."
  exit 1
fi

echo "Copying plugin files to $ITFLOW_DIR/plugins/$PLUGIN_NAME"
rm -rf "$ITFLOW_DIR/plugins/$PLUGIN_NAME"
cp -r "$PLUGIN_SRC_DIR" "$ITFLOW_DIR/plugins/"

# Apply core patches (if any)
if [[ -d "$PATCH_DIR" ]]; then
  for patch in "$PATCH_DIR"/*.patch; do
    if [[ -f "$patch" ]]; then
      echo "Applying core patch: $(basename "$patch")"
      patch -d "$ITFLOW_DIR" -p1 < "$patch"
    fi
  done
fi

# Run SQL migration if config is available
if [[ -f "$MIGRATION" ]]; then
  echo "Would you like to apply the database migration for Sola Payments settings? (y/n)"
  read APPLY_MIG
  if [[ "$APPLY_MIG" =~ ^[Yy]$ ]]; then
    read -p "DB username: " DB_USER
    read -s -p "DB password: " DB_PASS
    echo
    read -p "DB name: " DB_NAME
    mysql -u "$DB_USER" -p"$DB_PASS" "$DB_NAME" < "$MIGRATION"
    echo "Migration applied."
  else
    echo "Skipping migration (you can run it manually later)."
  fi
fi

echo "Plugin installation complete!"
echo "Visit the ITFlow admin panel to configure Sola Payments."