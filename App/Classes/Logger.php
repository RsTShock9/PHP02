<?php

namespace App\Classes;

use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

class Logger extends AbstractLogger implements LoggerInterface
{
    use Singleton;

    protected array $logFile;

    public function __construct()
    {
        $config = Config::instance()->data;
        $this->logFile = $config['errors'];
    }

    public function log($level, $message, array $context = [])
    {
        $log = "\n" . '[Date: ' . date('Y-m-d H:i:s') . '] ' .
            "\n" . 'Level: ' . ucfirst($level) .
            "\n" . 'Message: ' . $message;
        file_put_contents($this->logFile['log'], $log . PHP_EOL, FILE_APPEND);
    }
}
