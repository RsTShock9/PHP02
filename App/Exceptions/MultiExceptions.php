<?php

namespace App\Exceptions;

class MultiExceptions extends \Exception implements \Countable
{
    protected array $errors = [];

    public function addError(\Throwable $e)
    {
        $this->errors[] = $e;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function count()
    {
        return count($this->errors);
    }
}