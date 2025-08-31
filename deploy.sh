#!/bin/bash

# Laravel Production Deployment Script
# Run this script on your server after uploading files

echo "🚀 Starting Laravel deployment..."

# Clear all caches
echo "📦 Clearing caches..."
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Create storage link
echo "🔗 Creating storage link..."
php artisan storage:link

# Set proper permissions
echo "🔐 Setting permissions..."
chmod -R 755 storage
chmod -R 755 bootstrap/cache
chmod -R 755 public

# Install dependencies and build assets
echo "📦 Installing dependencies..."
npm install

echo "🏗️ Building assets for production..."
npm run build

echo "✅ Deployment complete!"
echo ""
echo "📋 Manual steps to complete:"
echo "1. Point your domain document root to: /path/to/your/project/public"
echo "2. Ensure .env file is configured with production settings"
echo "3. Run database migrations if needed: php artisan migrate"
echo ""
echo "🌐 Your Laravel app should now be ready!"
