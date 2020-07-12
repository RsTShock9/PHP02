<?php

namespace App\Classes;

use App\Classes\Singleton;

class Config
{
    use Singleton;

    public array $data = [];

    protected function __construct()
    {
        $this->data = include __DIR__ . '/../config.php';
    }
}
