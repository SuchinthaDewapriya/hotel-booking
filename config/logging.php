<?php

<<<<<<< HEAD
use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogUdpHandler;
use Monolog\Processor\PsrLogMessageProcessor;
=======
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogUdpHandler;
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422

return [

    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    |
    | This option defines the default log channel that gets used when writing
    | messages to the logs. The name specified in this option should match
    | one of the channels defined in the "channels" configuration array.
    |
    */

    'default' => env('LOG_CHANNEL', 'stack'),

    /*
    |--------------------------------------------------------------------------
<<<<<<< HEAD
    | Deprecations Log Channel
    |--------------------------------------------------------------------------
    |
    | This option controls the log channel that should be used to log warnings
    | regarding deprecated PHP and library features. This allows you to get
    | your application ready for upcoming major versions of dependencies.
    |
    */

    'deprecations' => [
        'channel' => env('LOG_DEPRECATIONS_CHANNEL', 'null'),
        'trace' => false,
    ],

    /*
    |--------------------------------------------------------------------------
=======
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
    | Log Channels
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log channels for your application. Out of
    | the box, Laravel uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Drivers: "single", "daily", "slack", "syslog",
    |                    "errorlog", "monolog",
    |                    "custom", "stack"
    |
    */

    'channels' => [
        'stack' => [
            'driver' => 'stack',
<<<<<<< HEAD
            'channels' => ['single'],
=======
            'channels' => ['daily'],
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
            'ignore_exceptions' => false,
        ],

        'single' => [
            'driver' => 'single',
            'path' => storage_path('logs/laravel.log'),
<<<<<<< HEAD
            'level' => env('LOG_LEVEL', 'debug'),
            'replace_placeholders' => true,
=======
            'level' => 'debug',
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
        ],

        'daily' => [
            'driver' => 'daily',
            'path' => storage_path('logs/laravel.log'),
<<<<<<< HEAD
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 14,
            'replace_placeholders' => true,
=======
            'level' => 'debug',
            'days' => 14,
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
        ],

        'slack' => [
            'driver' => 'slack',
            'url' => env('LOG_SLACK_WEBHOOK_URL'),
            'username' => 'Laravel Log',
            'emoji' => ':boom:',
<<<<<<< HEAD
            'level' => env('LOG_LEVEL', 'critical'),
            'replace_placeholders' => true,
=======
            'level' => 'critical',
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
        ],

        'papertrail' => [
            'driver' => 'monolog',
<<<<<<< HEAD
            'level' => env('LOG_LEVEL', 'debug'),
            'handler' => env('LOG_PAPERTRAIL_HANDLER', SyslogUdpHandler::class),
            'handler_with' => [
                'host' => env('PAPERTRAIL_URL'),
                'port' => env('PAPERTRAIL_PORT'),
                'connectionString' => 'tls://'.env('PAPERTRAIL_URL').':'.env('PAPERTRAIL_PORT'),
            ],
            'processors' => [PsrLogMessageProcessor::class],
=======
            'level' => 'debug',
            'handler' => SyslogUdpHandler::class,
            'handler_with' => [
                'host' => env('PAPERTRAIL_URL'),
                'port' => env('PAPERTRAIL_PORT'),
            ],
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
        ],

        'stderr' => [
            'driver' => 'monolog',
<<<<<<< HEAD
            'level' => env('LOG_LEVEL', 'debug'),
=======
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
            'handler' => StreamHandler::class,
            'formatter' => env('LOG_STDERR_FORMATTER'),
            'with' => [
                'stream' => 'php://stderr',
            ],
<<<<<<< HEAD
            'processors' => [PsrLogMessageProcessor::class],
=======
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
        ],

        'syslog' => [
            'driver' => 'syslog',
<<<<<<< HEAD
            'level' => env('LOG_LEVEL', 'debug'),
            'facility' => LOG_USER,
            'replace_placeholders' => true,
=======
            'level' => 'debug',
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
        ],

        'errorlog' => [
            'driver' => 'errorlog',
<<<<<<< HEAD
            'level' => env('LOG_LEVEL', 'debug'),
            'replace_placeholders' => true,
        ],

        'null' => [
            'driver' => 'monolog',
            'handler' => NullHandler::class,
        ],

        'emergency' => [
            'path' => storage_path('logs/laravel.log'),
=======
            'level' => 'debug',
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
        ],
    ],

];
