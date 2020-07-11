<?php

namespace App\Exceptions;

trait Count
{
    protected array $errors = [];

    public function count(): int
    {
        return count($this->errors);
    }
}
