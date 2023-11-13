<?php

// DATABASE
define('DB_HOST', 'localhost');
define('DB_NAME', 'YOUR DB NAME');
define('DB_USER', 'YOUR DB USER NAME');
define('DB_PASS', 'YOUR DB USER PASSWORD');

// APPROOT
define('APPROOT', dirname(dirname(__FILE__)));
// URLROOT
define('URLROOT', 'http://website.com');
// CURRENTURL
define('CURRENTURL', $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
// SITENAME
define('SITENAME', 'YOUR SITE NAME');
// SITEDESCRIPTION
define('SITE_DESCRIPTION', 'YOUR SITE META DESCRIPTION');
// VERSION
define('VERSION', '0.0.1');

// Initialize SMTP
define("SMTP_HOST", 'YOUR SMTP HOST');
define("SMTP_PORT", 2525);
define("SMTP_EMAIL", 'YOUR SMTP EMAIL');
define("SMTP_PASSWORD", 'YOUR SMTP PASSWORD');
define("FROM_NAME", 'YOUR SITE NAME');
define("FROM_EMAIL", 'noreply@example.com');

// Initialize admin email
define('ADMIN_EMAIL', 'support@website.com');
define('TWITTER_USER', '@twitterusername');

// Initialize contact details
define('CONTACT_EMAIL', 'contact@website.com');
define('CONTACT_PHONE', '+91 9876543210');
define('CONTACT_ADDRESS', 'YOUR CONTACT ADDRESS');
define('SOCIAL_FB', '#');
define('SOCIAL_TW', '#');
define('SOCIAL_INSTA', '#');
define('SOCIAL_LN', '#');
define('SOCIAL_YT', '#');
define('SOCIAL_PT', '#');