<?php

require __DIR__ . '/../autoload.php';

use \App\Controllers\Admin\Index;

$uri = $_SERVER['REQUEST_URI'];
$request = explode('/', $uri);

if (isset($parts[3])) {
    $ctrl1 = $request[1] ? ucfirst($request[1]) : 'Admin';
    $ctrl3 = ucfirst($parts[3]);
    $class = '\\App\Controllers\\' . $ctrl1 . '\\' . $ctrl3;
} else {
    $ctrl1 = $request[1] ? ucfirst($request[1]) : 'Admin';
    $ctrl2 = $request[2] ? ucfirst($request[2]) : 'Index';
    $class = '\\App\Controllers\\' . $ctrl1 . '\\' . $ctrl2;
}

if (file_exists(__DIR__ . $class . '.php')) {
    $ctrl = new $class;
} else {
    $ctrl = new Index();
}

$ctrl->action();