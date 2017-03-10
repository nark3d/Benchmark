<?php

namespace BestServedCold\Benchmark;

use BestServedCold\Benchmark\Output\Console;
use BestServedCold\Benchmark\Output\FormatInterface;
use BestServedCold\Benchmark\Output\Http;
use BestServedCold\Benchmark\Output\OutputInterface;
use Symfony\Component\Console\Helper\Table;

class Output
{
    private static $interfaces = [
        Console::class => [
            'cli',
            'cli-server'
        ],
        Http::class    => [
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

    public static function output(Benchmark $benchmark, $interface = false)
    {
        $interface = self::outputClass($interface ?: php_sapi_name());
        return $interface::output($benchmark);
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
