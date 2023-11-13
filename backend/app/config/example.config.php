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
// SITEURL
define('SITEURL', 'http://localhost/echoblog');
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
define('USER_DIRECTORY', DOCUMENTROOT.'/echoadmin/public/img/users/'); // change to your backend public img directory location
define('POST_DIRECTORY', DOCUMENTROOT.'/echoadmin/public/img/posts/'); // change to your backend public img directory location
define('CATEGORY_DIRECTORY', DOCUMENTROOT.'/echoadmin/public/img/cate/'); // change to your backend public img directory location