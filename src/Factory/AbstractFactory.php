<?php

namespace BestServedCold\Benchmark\Factory;

use BestServedCold\PhalueObjects\Metric;

abstract class AbstractFactory
{
    protected static $metrics = [];
    protected static $allowedMethods = [];

    public static function __callStatic($name, $arguments)
    {
        if (in_array($name, static::$allowedMethods)) {
            return self::map($name, empty($arguments) ? static::$metrics : reset($arguments));
        }
    }

    public static function map($method, array $metrics)
    {
        return array_map(function($metric) use ($method) {
            return self::runMethod($metric, $method);
        }, $metrics);
    }

    protected static function runMethod($metric, $method)
    {
        return $metric instanceof Metric
            ? $metric::now()->$method($metric)
            : $metric::$method();
    }

    public static function metrics(array $metrics)
    {
        self::$metrics = $metrics;
    }
}
