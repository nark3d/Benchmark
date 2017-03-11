<?php

namespace BestServedCold\Benchmark;

use BestServedCold\Benchmark\Output\Console;
use BestServedCold\Benchmark\Output\Html;
use BestServedCold\Benchmark\Output\OutputInterface;

/**
 * Class Output
 *
 * @package BestServedCold\Benchmark
 */
class Output
{
    /**
     * @var array
     */
    private static $interfaces = [
        Console::class => [
            'cli',
            'cli-server'
        ],
        Html::class    => [
            'aolserver',
            'apache',
            'apache2filter',
            'apache2handler',
            'caudium',
            'cgi-fcgi',
            'continuity',
            'embed',
            'fpm-fcgi',
            'isapi',
            'litespeed',
            'milter',
            'nsapi',
            'phttpd',
            'pi3web',
            'roxen',
            'thttpd',
            'tux',
            'webjames'
        ]
    ];

    /**
     * @param  Benchmark            $benchmark
     * @param  bool|OutputInterface $interface
     * @throws \Exception
     * @return string
     */
    public static function output(Benchmark $benchmark, $interface = false)
    {
        if (! $class = self::outputClass($interface ?: php_sapi_name())) {
            throw new \Exception('Interface ['. $interface . '] is unknown.');
        }
        
        return $class::output($benchmark);
    }

    /**
     * @param  $sapi
     * @return OutputInterface
     */
    private static function outputClass($sapi)
    {
        foreach (static::$interfaces as $key => $value) {
            if (in_array($sapi, $value)) {
                return $key;
            }
        }
    }

}
