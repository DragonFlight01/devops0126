#!/bin/bash

# Exit on any error
set -e

# Run Laravel migrations
echo "Running migrations..."
php artisan migrate --force

# Seed the database
#echo "Seeding database..."
#php artisan db:seed --force

# Start Apache in foreground
echo "Starting Apache..."
apache2-foreground
