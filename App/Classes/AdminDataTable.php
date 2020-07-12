<?php

namespace App\Classes;

class AdminDataTable
{
    protected iterable $models;
    protected array $functions;

    public function __construct(iterable $models, ...$functions)
    {
        $this->models = $models;
        $this->functions = $functions;
    }

    public function render(): array
    {
        $ret = [];
        foreach ($this->models as $key => $value) {
            foreach ($this->functions as $function) {
                $ret[$key][] = $function($value);
            }
        }
        return $ret;
    }
}
