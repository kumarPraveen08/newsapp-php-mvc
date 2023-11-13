<?php

// DATABASE
define('DB_HOST', 'localhost');
define('DB_NAME', 'echoblog');
define('DB_USER', 'root');
define('DB_PASS', '');

// APPROOT
define('APPROOT', dirname(dirname(__FILE__)));
// URLROOT
define('URLROOT', 'http://localhost/echoadmin');
// DOCUMENTROOT
define('DOCUMENTROOT', $_SERVER['DOCUMENT_ROOT']);
// CURRENTURL
define('CURRENTURL', $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
// SITENAME
define('SITENAME', 'EchoBolg');
// SITEURL
define('SITEURL', 'http://localhost/echoblog');
// SITEDESCRIPTION
define('SITE_DESCRIPTION', 'this is our website description');
// VERSION
define('DEVELOPER', 'Praveen Prajapati');
// VERSION
define('VERSION', '0.0.1');

// Initialize SMTP
define("SMTP_HOST", 'smtp.mailtrap.io');
define("SMTP_PORT", 2525);
define("SMTP_EMAIL", '1afbfde77dfd3f');
define("SMTP_PASSWORD", 'd8f9b38cba007c');
define("FROM_NAME", 'EchoBolg');
define("FROM_EMAIL", 'noreply@example.com');

// Initialize admin email
define('ADMIN_EMAIL', 'support@website.com');
define('TWITTER_USER', '@thepracticaldev');

// Table results length
define('RESULT_LENGTH', 10);
define('MAX_IMAGE_SIZE_SUPPORT', 1000000); // 1MB

// Image Upload Locations
define('USER_DIRECTORY', DOCUMENTROOT.'/echoadmin/public/img/users/');
define('POST_DIRECTORY', DOCUMENTROOT.'/echoadmin/public/img/posts/');
define('CATEGORY_DIRECTORY', DOCUMENTROOT.'/echoadmin/public/img/cate/');