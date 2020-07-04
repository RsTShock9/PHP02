<?php

namespace App;

class Logger
{
    public static function logs(\Throwable $error)
    {
        $logs = "\n \n" . '[' . date('Y-m-d H:i:s') . '] ' . "\n" .$error;
        file_put_contents(__DIR__ . '/../logs.txt', $logs, FILE_APPEND);
    }

    public static function logsAdmin(\Throwable $error)
    {
        $logsAdmin = "\n \n" . '[' . date('Y-m-d H:i:s') . '] ' . "\n" .$error;
        file_put_contents(__DIR__ . '/../logsAdmin.txt', $logsAdmin, FILE_APPEND);
    }
}
