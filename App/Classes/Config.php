<?php

namespace App\Classes;

class Config
{
    protected static $instance = null;
    public $data = [];

    protected function __construct()
    {
        $this->data = include __DIR__ . '/../config.php';
    }

    public static function instance(): object
    {
        if (null === self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}
