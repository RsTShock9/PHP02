<?php

namespace App\Classes;

trait Singleton
{
    protected static $instance = null;

    protected function __construct()
    {
    }

    public static function instance(): object
    {
        if (null === self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}