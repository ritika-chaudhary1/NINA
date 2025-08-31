# Document Root Configuration Guide

## 🚨 CRITICAL: Your document root MUST point to the `public/` folder

If your domain points to the base Laravel folder instead of `public/`, your entire codebase is exposed to the web, creating a **major security vulnerability**.

## ✅ How to Check Current Document Root

### Method 1: Check via Browser
Visit your domain and look for these signs:

**❌ WRONG (pointing to base folder):**
- You see Laravel folder structure in browser
- Files like `.env`, `composer.json` are accessible
- URL shows: `yourdomain.com/public/` to access your site

**✅ CORRECT (pointing to public folder):**
- Your website loads directly at `yourdomain.com`
- Laravel files are NOT visible in browser
- Trying to access `.env` returns 404

### Method 2: Simple File Test
I've created a test file for you. Visit:
```
https://yourdomain.com/test.txt
```

**✅ CORRECT:** Shows "PUBLIC DIRECTORY IS WORKING"
**❌ WRONG:** Shows 404, downloads file, or shows Laravel folders

### Method 3: Laravel Route Test
Visit this URL:
```
https://yourdomain.com/check-public
```

**✅ CORRECT:** Shows "Laravel is serving from public/index.php"
**❌ WRONG:** Shows raw PHP code or 404

### Method 4: Security Test
Try accessing these URLs (they should return 404 if configured correctly):
```
https://yourdomain.com/.env
https://yourdomain.com/composer.json
https://yourdomain.com/artisan
```

## 🔧 How to Fix Document Root

### For cPanel Hosting:
1. Login to cPanel
2. Go to **"Subdomains"** or **"Addon Domains"**
3. Find your domain
4. Click **"Manage"** or **"Document Root"**
5. Change from:
   ```
   /home/username/NINA
   ```
   To:
   ```
   /home/username/NINA/public
   ```

### For Shared Hosting (File Manager):
1. Login to hosting control panel
2. Go to **File Manager**
3. Navigate to your domain's folder
4. Look for **"Document Root"** or **"Public HTML"** setting
5. Update path to include `/public`

### For VPS/Dedicated Server (Apache):
Edit your virtual host configuration:
```apache
<VirtualHost *:80>
    ServerName yourdomain.com
    DocumentRoot /path/to/NINA/public
    
    <Directory /path/to/NINA/public>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

### For VPS/Dedicated Server (Nginx):
```nginx
server {
    listen 80;
    server_name yourdomain.com;
    root /path/to/NINA/public;
    
    index index.php index.html;
    
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
    
    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

## 🛡️ Security Verification Checklist

After changing document root, verify:

- [ ] Main site loads at `yourdomain.com` (not `yourdomain.com/public/`)
- [ ] `.env` file returns 404: `yourdomain.com/.env`
- [ ] `composer.json` returns 404: `yourdomain.com/composer.json`
- [ ] `artisan` returns 404: `yourdomain.com/artisan`
- [ ] CSS/JS assets load properly
- [ ] Images in `public/images/` are accessible

## 📞 Contact Your Hosting Provider

If you cannot find these settings:

1. **Contact your hosting provider support**
2. **Request:** "Please set my domain's document root to `/home/username/NINA/public` instead of `/home/username/NINA`"
3. **Explain:** "I need the document root to point to the public folder of my Laravel application for security reasons"

## 🚨 Immediate Action Required

**This is a critical security issue.** Your Laravel application files, including sensitive configuration, are currently exposed to the web. Please fix this immediately by following the steps above.

Once fixed, your site will be secure and properly configured for production use.
