<?php

use Illuminate\Http\Request;

// echo "testtttttt";
define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
(require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Request::capture());


    // CKTXhq6qZaD2
    // ahmedenos.kesug.com
    // if0_38181115

    // n_pass=>g143djzt
    // ftp.infinityfree.com
    // sql111.infinityfree.com
    // if0_38181115_cars