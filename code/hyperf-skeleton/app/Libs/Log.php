<?php

namespace App\Libs;

use Hyperf\Context\ApplicationContext;
use Hyperf\Logger\LoggerFactory;

/**
 * @method static debug($message, array $context = [])
 * @method static info($message, array $context = [])
 * @method static notice($message, array $context = [])
 * @method static alert($message, array $context = [])
 * @method static warning($message, array $context = [])
 * @method static error($message, array $context = [])
 * @method static emergency($message, array $context = [])
 * @method static log($level, $message, array $context = [])
 */
class Log
{
    public static function get(string $name = 'app')
    {
        return ApplicationContext::getContainer()->get(LoggerFactory::class)->get($name);
    }

    public static function __callStatic($name, $arguments)
    {
        return self::get()->$name(...$arguments);
    }
}