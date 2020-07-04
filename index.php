<?php

require __DIR__ . '/autoload.php';

use \App\Controllers\Index;
use \App\Exceptions\DbException;
use \App\Exceptions\NotFound404;
use \App\Controllers\Error;

$uri = $_SERVER['REQUEST_URI'];
$request = explode('/', $uri);

if (isset($request[2])) {
    $ctrl2 = ucfirst($request[2]);
    $class = '\App\Controllers\\' . $ctrl2;
} else {
    $ctrl1 = $request[1] ? ucfirst($request[1]) : 'Index';
    $class = '\App\Controllers\\' . $ctrl1;
}

if (class_exists($class)) {
    $ctrl = new $class;
} else {
    $ctrl = new Index();
}

try {
    $ctrl->action();
} catch (DbException $error) {
    $ctrl = new Error($error);
    $ctrl->action();
} catch (NotFound404 $error) {
    $ctrl = new Error($error);
    $ctrl->action();
}
