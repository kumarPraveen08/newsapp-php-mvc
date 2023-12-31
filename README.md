
# Newsapp PHP MVC (model view controller)

This is a full app for news website with client/frontend and backend panel created with OOP PHP and using MVC structure. This is just a simple project created in free time. If you have any suggestion so, please feel free to contact me on my social profile.

Backend and Client Demo: https://s5.gifyu.com/images/SRMqC.gif

## It consists of:

- User Registration 
- User role such as Admin, User and Author with permissions according to their role.
- Post publication (Show, Add, Edit, Remove)
- Category publication (Show, Add, Edit, Remove)
- Page publication (Show, Add, Edit, Remove)
- User publication (Show, Add, Edit, Remove)
- Newsletter publication (Show, Add, Edit, Remove)
- Comment publication (Show, Add, Edit, Remove)
- Profile (Show, Edit)


## Client Installation

Installation is very simple and requires to change information in 2 files: public/.htaccess and app/config/config.php


## public/.htaccess

```Apache
<IfModule mod_rewrite.c>
    Options -Multiviews
    RewriteEngine On
    RewriteBase /client/public
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule  ^(.+)$ index.php?url=$1 [QSA,L]
</IfModule>
```

Change the row: `RewriteBase /client/public` with the root folder of your website (i.e. in most cases it is sufficient to simply remove `/client`.)


## app/config/config.php

```PHP
// DATABASE
define('DB_HOST', 'localhost');
define('DB_NAME', 'YOUR_DB_NAME');
define('DB_USER', 'YOUR_DB_USER_NAME');
define('DB_PASS', 'YOUR_DB_USER_PASSWORD');

// APPROOT
define('APPROOT', dirname(dirname(__FILE__)));
// URLROOT
define('URLROOT', 'http://localhost/client');
// IMAGEROOT
define('IMAGEROOT', 'http://localhost/backend');
// CURRENTURL
define('CURRENTURL', $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
// SITENAME
define('SITENAME', 'YOUR_WEBSITE_NAME');
// SITEDESCRIPTION
define('SITE_DESCRIPTION', 'YOUR_WEBSITE_DESCRIPTION');
// VERSION
define('VERSION', '0.0.1');

// Initialize SMTP
define("SMTP_HOST", 'SMTP_HOST');
define("SMTP_PORT", 'SMTP_PORT');
define("SMTP_EMAIL", 'SMTP_EMAIL');
define("SMTP_PASSWORD", 'SMTP_PASSWORD');
define("FROM_NAME", 'FROM_NAME');
define("FROM_EMAIL", 'noreply@example.com');

// Initialize admin email
define('ADMIN_EMAIL', 'support@website.com');
define('TWITTER_USER', '@yourtwitterusername');

// Pagination
define('POST_LIMIT', 6);
define('PAGE_LIMIT', 6);
define('ARCHIVE_LIMIT', 6);

// Initialize contact details
define('CONTACT_TITLE', 'General Customer Care & Technical Support');
define('CONTACT_DESCRIPTION', 'Ornare arcu dui vivamus arcu felis. Nunc sed id semper risus in hendrerit gravida rutrum quisque. Nullam eget felis eget nunc lobortis mattis');
define('CONTACT_EMAIL', 'contact@website.com');
define('CONTACT_PHONE', '+91 9876543210');
define('CONTACT_ADDRESS', 'New Delhi, India');
define('CONTACT_MAP_EMBED_URI', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d28020.539071952!2d77.22915089967404!3d28.612752458107472!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce318a027dbb9%3A0xf12a1c6b59580448!2sNational%20Zoological%20Park%2C%20Delhi!5e0!3m2!1sen!2sbd!4v1699689326439!5m2!1sen!2sbd');

// Social Links
define('SOCIAL_FB', '#');
define('SOCIAL_X', 'https://twitter.com/username');
define('SOCIAL_INSTA', '#');
define('SOCIAL_LN', '#');
define('SOCIAL_YT', '#');
define('SOCIAL_PT', '#');

// Social fans
define('FB_FANS', '20K');
define('INSTA_FANS', '15K');
define('YT_FANS', '12K');
define('X_FANS', '1M');
define('LN_FANS', '2K');
define('PT_FANS', '120K');

// Home Category Section
define('FIRST_COL', 'Fashion');
define('SECOND_COL', 'Technology');
define('THIRD_COL', 'Travel');
define('FIRST_COL_CATE_ID', 1);
define('SECOND_COL_CATE_ID', 2);
define('THIRD_COL_CATE_ID', 3);
```

- Change the DB Params to those of your database
- Change the URL Root to your website server
- Change the IMAGE Root to your backend server
- Change the Sitename as you wish
- Change the Site Description as you wish
- Change the AppVersion as necessary
- Change the SMTP deatils to your Mail SMTP details
- Change the POST, PAGE AND ARCHIVE pages content limit, as default keep it 10
- Change the contact page details to whatever you want to display on contact page
- Change the Social Links to your social profile links
- Change the Social Fans number to user social followers count
- Change the Category Section Name and Category Ids to your one (In order to get the category id's, you will need to create category through backend or from phpmyadmin), these category name and data will display at home page in seventh section before instagram images (check homepage seventh section to see the changes)


## Backend Installation

Installation is very simple and requires to change information in 2 files: public/.htaccess and app/config/config.php


## public/.htaccess

```Apache
<IfModule mod_rewrite.c>
    Options -Multiviews
    RewriteEngine On
    RewriteBase /backend/public
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule  ^(.+)$ index.php?url=$1 [QSA,L]
</IfModule>
```

Change the row: `RewriteBase /backend/public` with the root folder of your website (i.e. in most cases it is sufficient to simply remove `/backend`.)


## app/config/config.php

```PHP
// DATABASE
define('DB_HOST', 'localhost');
define('DB_NAME', 'YOUR_DB_NAME');
define('DB_USER', 'YOUR_DB_USER_NAME');
define('DB_PASS', 'YOUR_DB_USER_PASSWORD');

// APPROOT
define('APPROOT', dirname(dirname(__FILE__)));
// URLROOT
define('URLROOT', 'http://localhost/backend');
// CURRENTURL
define('CURRENTURL', $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
// SITENAME
define('SITENAME', 'YOUR_WEBSITE_NAME');
// SITEURL
define('SITEURL', 'http://localhost/client');
// SITEDESCRIPTION
define('SITE_DESCRIPTION', 'YOUR_WEBSITE_DESCRIPTION');
// DEVELOPER
define('DEVELOPER', 'Praveen Prajapati');
// VERSION
define('VERSION', '0.0.1');

// Table results length
define('RESULT_LENGTH', 10);
define('MAX_IMAGE_SIZE_SUPPORT', 1000000); // 1MB

// Image Upload Locations
define('USER_DIRECTORY', DOCUMENTROOT.'/newsapp/public/img/users/'); // change to your backend public img directory location
define('POST_DIRECTORY', DOCUMENTROOT.'/newsapp/public/img/posts/'); // change to your backend public img directory location
define('CATEGORY_DIRECTORY', DOCUMENTROOT.'/newsapp/public/img/cate/'); // change to your backend public img directory location
```

- Change the DB Params to those of your database
- Change the URL Root to your backend website server
- Change the Sitename as you wish
- Change the Site URL to your client/frontend website server
- Change the Site Description as you wish
- Change the Developer as you wish
- Change the AppVersion as necessary
- Change the Table results length as necessary, as default keep it 10
- Change the Max image upload size as you wish in bytes, as default keep it 1000000 // 1MB
- Change the User, Post, and Category image upload directory to you client server address, (i.e. in most cases it is sufficient to simply remove /newsapp.)


## Database

You can find `database.sql` file in resource folder, upload it to your database. The website requires only 6 tables: `posts` `pages` `newsletters` `categories` `comments` and `users`.


## 🚀 About Me

[@Praveen Prajapati](https://www.github.com/kumarPraveen08)
I'm a full stack developer. 

- Special thanks for [@Brad Traversy](https://github.com/bradtraversy) for `TraversyMVC PHP Framework`, [@Adminlte](https://github.com/ColorlibHQ/AdminLTE) for `Adminlte -  Bootstrap Admin Template`, and `Echo template`

