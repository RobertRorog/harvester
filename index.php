<?php
 
if (file_exists('vendor/autoload.php')) {
    require 'vendor/autoload.php';
} else {
    echo "<h1>Please install via composer.json</h1>";
    echo "<p>Install Composer</p>";
    echo "<p>Once composer is installed navigate to the working directory in your terminal/command promt and enter 'composer install'</p>";
    exit;
}

define('ENVIRONMENT', 'development');

if (defined('ENVIRONMENT')) {
    switch (ENVIRONMENT) {
        case 'development':
            error_reporting(E_ALL);            
            ini_set('error_reporting', E_ALL);
            break;
        case 'production':
            error_reporting(0);
            ini_set('error_reporting', 0);
            break;
        default:
            exit('The application environment is not set correctly.');
    }

}


    
require SMVC.'app/Core/routes.php';

