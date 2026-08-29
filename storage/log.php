<?php

class Log
{
    public static function write(string $message): void
    {
        $file = __DIR__ . '/logs/app.log';

        $time = date('Y-m-d H:i:s');

        file_put_contents(
            $file,
            "[$time] $message" . PHP_EOL,
            FILE_APPEND
        );
    }
}