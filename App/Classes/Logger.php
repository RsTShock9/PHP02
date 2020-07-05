<?php

namespace App\Classes;

use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

class Logger extends AbstractLogger implements LoggerInterface
{
    protected \Throwable $exception;

    public function __construct(\Throwable $ex)
    {
        $this->exception = $ex;
    }

    public function log($level, $message, array $context = [])
    {
        $message = "\n" . '[' . date('Y-m-d H:i:s') . '] '
            . "\n" . 'File - ' . $this->exception->getFile()
            . "\n" . 'Level - ' . $level
            . "\n" . 'Message - ' . $this->exception->getMessage()
            . "\n" . 'Trace - ' . $this->exception->getTraceAsString();
        file_put_contents(__DIR__ . '/../logs.txt', $message . PHP_EOL, FILE_APPEND);
    }
}
