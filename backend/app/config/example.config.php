<?php

// DATABASE
define('DB_HOST', 'localhost');
define('DB_NAME', 'YOUR_DB_NAME');
define('DB_USER', 'YOUR_DB_USER_NAME');
define('DB_PASS', 'YOUR_DB_USER_PASSWORD');

// APPROOT
define('APPROOT', dirname(dirname(__FILE__)));
// URLROOT
define('URLROOT', 'http://localhost/newsapp');
// IMAGEROOT
define('IMAGEROOT', 'http://localhost/newsapp-backend');
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

// Table results length
define('RESULT_LENGTH', 10);
define('MAX_IMAGE_SIZE_SUPPORT', 1000000); // 1MB

// Image Upload Locations
define('USER_DIRECTORY', DOCUMENTROOT.'/echoadmin/public/img/users/'); // change to your backend public img directory location
define('POST_DIRECTORY', DOCUMENTROOT.'/echoadmin/public/img/posts/'); // change to your backend public img directory location
define('CATEGORY_DIRECTORY', DOCUMENTROOT.'/echoadmin/public/img/cate/'); // change to your backend public img directory location