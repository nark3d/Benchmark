<?php

namespace BestServedCold\Benchmark;

use BestServedCold\Benchmark\Format\Console;
use BestServedCold\Benchmark\Format\Http;
use Symfony\Component\Console\Helper\Table;

class Format
{
    public function __construct(Table $table)
    {
        $this->table = $table;
    }

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

    public static function output(Benchmark $benchmark, Table $table, $name = false, $interface = false)
    {
        $interface = self::outputClass($interface ?: php_sapi_name());
        return $interface::output($benchmark, $table, $name);
    }

    /**
     * @param  $sapi
     * @return FormatInterface
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
