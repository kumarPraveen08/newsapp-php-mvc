<?php

// DATABASE
define('DB_HOST', 'localhost');
define('DB_NAME', 'echoblog');
define('DB_USER', 'root');
define('DB_PASS', '');

// APPROOT
define('APPROOT', dirname(dirname(__FILE__)));
// URLROOT
define('URLROOT', 'http://localhost/echoblog');
// IMAGEROOT
define('IMAGEROOT', 'http://localhost/echoadmin');
// CURRENTURL
define('CURRENTURL', $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
// SITENAME
define('SITENAME', 'EchoBolg');
// SITEDESCRIPTION
define('SITE_DESCRIPTION', 'this is our website description');
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
define('SOCIAL_X', 'https://twitter.com');
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