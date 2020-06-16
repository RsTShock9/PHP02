<?php

namespace App\Models;

use App\Model;
use App\Models;

class Article extends Model
{
    public const TABLE = 'articles';

    public string $title;
    public string $content;
    public string $author;
}