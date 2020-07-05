<?php

namespace App\Models;

use App\Classes\Model;

class Author extends Model
{
    public const TABLE = 'authors';

    public string $name;
}
