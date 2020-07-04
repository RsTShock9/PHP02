<?php

require __DIR__ . '/../autoload.php';

use \App\Controllers\Admin\Index;
use \App\Exceptions\MultiExceptions;
use \App\Controllers\Admin\Errors;
use \App\Exceptions\NotFound404;
use \App\Exceptions\DbException;
use \App\Controllers\Error;

$uri = $_SERVER['REQUEST_URI'];
$request = explode('/', $uri);

if (isset($parts[3])) {
    $ctrl1 = $request[1] ? ucfirst($request[1]) : 'Admin';
    $ctrl3 = ucfirst($parts[3]);
    $class = '\App\Controllers\\' . $ctrl1 . '\\' . $ctrl3;
} else {
    $ctrl1 = $request[1] ? ucfirst($request[1]) : 'Admin';
    $ctrl2 = $request[2] ? ucfirst($request[2]) : 'Index';
    $class = '\App\Controllers\\' . $ctrl1 . '\\' . $ctrl2;
}

if (class_exists($class)) {
    $ctrl = new $class;
} else {
    $ctrl = new Index();
}

try {
    $ctrl->action();
} catch (MultiExceptions $error) {
    $ctrl = new Errors($error);
    $ctrl->action();
} catch (DbException $error) {
    $ctrl = new Error($error);
    $ctrl->action();
} catch (NotFound404 $error) {
    $ctrl = new Error($error);
    $ctrl->action();
}
