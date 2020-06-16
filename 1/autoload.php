<?php

spl_autoload_register(static function ($class) {
    require __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
}
);