# Laravel Production Deployment Guide

## ✅ Pre-Deployment Checklist

Your Laravel project is already configured correctly for deployment:

- ✅ `.htaccess` file exists in `public/` folder with proper rewrite rules
- ✅ Asset paths use `{{ asset() }}` helper function correctly
- ✅ Vite configuration is set up properly
- ✅ Bootstrap and dependencies are configured

## 🚀 Deployment Steps

### 1. Set Document Root
Point your domain to the `public/` folder of your Laravel project.

**For cPanel:**
```
Domain → Manage → Document Root → /home/username/NINA/public
```

**For Apache Virtual Host:**
```apache
DocumentRoot /path/to/your/NINA/public
```

### 2. Upload Files
Upload all project files to your server, maintaining the directory structure.

### 3. Configure Environment
- Copy `.env.example` to `.env`
- Update `.env` with production settings:
  ```
  APP_ENV=production
  APP_DEBUG=false
  APP_URL=https://yourdomain.com
  ```

### 4. Run Deployment Commands

**On Linux/Unix servers:**
```bash
chmod +x deploy.sh
./deploy.sh
```

**On Windows servers:**
```cmd
deploy.bat
```

**Manual commands (if scripts don't work):**
```bash
# Clear caches
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Create storage link
php artisan storage:link

# Install dependencies
npm install

# Build assets for production
npm run build

# Set permissions (Linux/Unix only)
chmod -R 755 storage bootstrap/cache public
```

### 5. Database Setup
```bash
# Run migrations
php artisan migrate

# Seed database (if needed)
php artisan db:seed
```

## 🔧 Asset Management

Your project uses Vite for asset compilation. The following files are already correctly configured:

- **Main Layout:** Uses `@vite(['resources/css/app.css', 'resources/js/app.js'])`
- **Custom Assets:** Use `{{ asset('css/style.css') }}` and `{{ asset('js/script.js') }}`
- **CDN Assets:** Bootstrap and Font Awesome are loaded from CDN

## 🛠️ Troubleshooting

### If CSS/JS not loading:
1. Ensure `npm run build` was executed
2. Check that `public/build/` directory exists with compiled assets
3. Verify `.env` has correct `APP_URL`

### If routes not working:
1. Verify document root points to `public/` folder
2. Check `.htaccess` file exists in `public/`
3. Ensure mod_rewrite is enabled on server

### Permission issues:
```bash
# Set correct permissions
chmod -R 755 storage bootstrap/cache
chmod -R 644 .env
```

## 📁 Required Files Structure
```
NINA/
├── public/              ← Document root should point here
│   ├── .htaccess       ← ✅ Already exists
│   ├── index.php
│   └── build/          ← Created by npm run build
├── storage/
├── bootstrap/cache/
└── ...
```

Your Laravel application is ready for production deployment! 🎉
