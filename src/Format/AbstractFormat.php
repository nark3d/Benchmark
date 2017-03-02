<?php

namespace BestServedCold\Benchmark\Format;

use BestServedCold\Benchmark\Benchmark;
use BestServedCold\PhalueObjects\Metric;
use BestServedCold\PhalueObjects\Metric\DeclaredInterface;
use BestServedCold\PhalueObjects\Metric\DeclaredTrait;
use BestServedCold\PhalueObjects\Metric\IncludedFile;
use BestServedCold\PhalueObjects\Metric\DeclaredClass;
use BestServedCold\PhalueObjects\Metric\DefinedConstant;
use BestServedCold\PhalueObjects\Metric\DefinedFunction;
use Symfony\Component\Console\Helper\Table;

abstract class AbstractFormat
{
    protected static $countMetrics = [
        DeclaredInterface::class,
        DeclaredTrait::class,
        IncludedFile::class,
        DefinedFunction::class,
        DeclaredClass::class,
        DefinedConstant::class
    ];

    protected static function metricOutput(Metric $metric)
    {
        return in_array(get_class($metric), self::$countMetrics) ? $metric->count() : (string) $metric;
    }

    public static function output(Benchmark $benchmark, Table $table, $name = false)
    {
        $results = $benchmark->get($name);
        $table->setHeaders(['Name', 'Metric', 'Value']);
        $table = $name ? static::row($table, $results, $name) : self::loopRows($table, $results);
        return $table->render();
    }

    protected static function loopRows(Table $table, array $rows)
    {
        foreach($rows as $name => $row) {
              $table = static::row($table, $row, $name);
        }

        return $table;
    }
}
