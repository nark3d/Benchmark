<?php

namespace BestServedCold\Benchmark\Output;

use BestServedCold\PhalueObjects\Metric;
use BestServedCold\PhalueObjects\Metric\DeclaredInterface;
use BestServedCold\PhalueObjects\Metric\DeclaredTrait;
use BestServedCold\PhalueObjects\Metric\IncludedFile;
use BestServedCold\PhalueObjects\Metric\DeclaredClass;
use BestServedCold\PhalueObjects\Metric\DefinedConstant;
use BestServedCold\PhalueObjects\Metric\DefinedFunction;
use Symfony\Component\Console\Output\OutputInterface;

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
     * @var OutputInterface|Html
     */
    protected $output;

    /**
     * AbstractOutput constructor.
     *
     * @param $output
     */
    public function __construct($output)
    {
        $this->output = $output;
    }

    /**
     * @param  Metric     $metric
     * @return int|string
     */
    protected static function metricOutput(Metric $metric)
    {
        return in_array(get_class($metric), self::$countMetrics) ? $metric->count() : (string) $metric;
    }

    /**
     * @param  Metric $metric
     * @param  string $name
     * @return array
     */
    protected static function populateRow(Metric $metric, $name)
    {
        return [$name, $metric->getShortName(), static::metricOutput($metric)];
    }
}
