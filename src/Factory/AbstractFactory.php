<?php

namespace BestServedCold\Benchmark\Factory;

use BestServedCold\PhalueObjects\Metric;

/**
 * Class AbstractFactory
 *
 * @package BestServedCold\Benchmark\Factory
 * @method  static array now()
 */
abstract class AbstractFactory
{
    /**
     * @var array
     */
    protected static $metrics = [];

    /**
     * @var array
     */
    protected static $allowedMethods = [];

    /**
     * @param  string $name
     * @param  string $arguments
     * @return array
     */
    public static function __callStatic($name, $arguments)
    {
        if (in_array($name, static::$allowedMethods)) {
            return self::map($name, empty($arguments) ? static::$metrics : reset($arguments));
        }
    }

    /**
     * @param  string $method
     * @param  array  $metrics
     * @return array
     */
    public static function map($method, array $metrics)
    {
        return array_map(function($metric) use ($method) {
            return self::runMethod($metric, $method);
        }, $metrics);
    }

    /**
     * @param  $metric
     * @param  $method
     * @return array
     */
    protected static function runMethod($metric, $method)
    {
        return $metric instanceof Metric ? $metric::now()->$method($metric) : $metric::$method();
    }

    /**
     * @param array $metrics
     */
    public static function metrics(array $metrics)
    {
        self::$metrics = $metrics;
    }
}
