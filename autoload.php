<?php

spl_autoload_register(static function ($class) {
    $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    }
});