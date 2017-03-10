<?php

namespace BestServedCold\Benchmark\Output;

use BestServedCold\PhalueObjects\Metric;
use BestServedCold\PhalueObjects\Metric\DeclaredInterface;
use BestServedCold\PhalueObjects\Metric\DeclaredTrait;
use BestServedCold\PhalueObjects\Metric\IncludedFile;
use BestServedCold\PhalueObjects\Metric\DeclaredClass;
use BestServedCold\PhalueObjects\Metric\DefinedConstant;
use BestServedCold\PhalueObjects\Metric\DefinedFunction;

/**
 * Class AbstractOutput
 *
 * @package BestServedCold\Benchmark\Output
 */
abstract class AbstractOutput
{
    /**
     * @var array
     */
    protected static $countMetrics = [
        DeclaredInterface::class,
        DeclaredTrait::class,
        IncludedFile::class,
        DefinedFunction::class,
        DeclaredClass::class,
        DefinedConstant::class
    ];

    /**
     * @var array
     */
    protected static $headers = ['Name', 'Metric', 'Value'];

    /**
     * @param  Metric     $metric
     * @return int|string
     */
    protected static function metricOutput(Metric $metric)
    {
        return in_array(get_class($metric), self::$countMetrics) ? $metric->count() : (string) $metric;
    }

    protected static function populateRow(Metric $metric, $name)
    {
        return [$name, $metric->getShortName(), static::metricOutput($metric)];
    }
}
