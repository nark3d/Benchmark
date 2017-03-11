<?php

namespace BestServedCold\Benchmark;

use BestServedCold\Benchmark\Factory\Measure;
use BestServedCold\Benchmark\Factory\Peak;

/**
 * Class Benchmark
 * 
 * @package BestServedCold\Benchmark
 */
class Benchmark
{
    /**
     * @var array
     */
    protected static $markers = [];

    /**
     * @var string
     */
    protected static $lastName;

    /**
     * Benchmark constructor.
     *
     * @param $markers
     */
    public function __construct($markers = [])
    {
        self::$markers = $markers;
    }

    /**
     * @param  bool|string $name
     * @return string
     */
    public static function start($name = false)
    {
        $name = self::getName($name);
        self::$markers[$name] = Measure::now();
        return $name;
    }

    /**
     * @param  bool   $name
     * @return string
     */
    public static function stop($name = null)
    {
        $name = $name ?: self::getLastName();
        self::$markers[$name] = array_merge(Measure::diff(self::$markers[$name]), Peak::now());
        return $name;
    }

    /**
     * @param  bool        $name
     * @return array|mixed
     */
    public static function getMarkers($name = false)
    {
        return $name ? [ $name => self::$markers[$name]] : self::$markers;
    }

    /**
     * @param  string|bool $name
     * @return static
     */
    public static function get($name = false)
    {
        return $name ? new self([$name => self::$markers[$name]]) : new static(self::$markers);
    }

    /**
     * @return string
     */
    private static function getLastName()
    {
        $name           = self::$lastName;
        self::$lastName = null;
        return $name;
    }

    /**
     * @param  bool   $name
     * @return string
     */
    private static function getName($name = false)
    {
        self::$lastName = $name ?: uniqid();
        return self::$lastName;
    }

    /**
     * @return void
     */
    public static function reset()
    {
        self::$lastName = null;
        self::$markers  = null;
    }
}
