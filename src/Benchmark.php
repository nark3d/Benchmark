<?php

namespace BestServedCold\Benchmark;

use BestServedCold\Benchmark\Factory\Measure;
use BestServedCold\Benchmark\Factory\Peak;
use BestServedCold\PhalueObjects\Metric\PeakMemoryUsage;
use Symfony\Component\Console\Formatter\OutputFormatter;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Output\ConsoleOutput;

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
     * @param  bool   $name
     * @return string
     */
    public static function human($name = false)
    {
        if ($name) {
            return self::humanFormat(self::$markers[$name]);
        } else {
            foreach (self::$markers as $name => $metrics) {
                echo '[' . $name . "]\n";
                echo self::humanFormat($metrics);
            }
        }
    }

    public static function humanFormat(array $metrics)
    {
        return implode(array_map(function ($metric) {
            return '[' . $metric->getShortName() . ']: [' . (string) $metric . "]\n";
        }, $metrics));
    }

    /**
     * @param  bool        $name
     * @return array|mixed
     */
    public static function get($name = false)
    {
        return $name ? self::$markers[$name] : self::$markers;
    }

    public static function output($name = false, $interface = false)
    {
        $output = new ConsoleOutput(true);
        $output->setFormatter(new OutputFormatter(true));
        $table = new Table($output);

        return Format::output(new static, $table, $name, $interface);
    }

    /**
     * @param bool $name
     */
    public static function start($name = false)
    {
        self::$markers[self::getName($name)] = Measure::now();
    }

    /**
     * @param bool $name
     */
    public static function stop($name = false)
    {
        $name ?: self::getLastName();
        self::$markers[$name] = array_merge(
            Measure::diff(self::$markers[$name]),
            Peak::now()
        );
    }

    /**
     * @param $name
     */
    private static function addPeak($name)
    {
        $peak = PeakMemoryUsage::now();
        self::$markers[$name][$peak->getShortName()] = $peak;
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
}
