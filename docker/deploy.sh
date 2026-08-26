#!/bin/bash
set -e

echo "==> Preparing WordPress filesystem"

mkdir -p /var/www/html/wp-content/upgrade

chown -R "${WSL_USER}:www-data" /var/www/html

find /var/www/html -type d -exec chmod 2775 {} \;
find /var/www/html -type f -exec chmod 664 {} \;

echo "==> Starting Apache"

exec docker-entrypoint.sh apache2-foreground