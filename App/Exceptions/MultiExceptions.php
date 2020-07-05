<?php

namespace App\Exceptions;

class MultiExceptions extends \Exception implements \Countable, \ArrayAccess
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

    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->errors[$offset];
    }

    public function offsetSet($offset, $value)
    {
        return $this->errors[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->errors[$offset]);
    }
}
