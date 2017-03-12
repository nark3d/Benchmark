<?php

namespace BestServedCold\Benchmark\Output;

use BestServedCold\HTMLBuilder\Output,
    BestServedCold\PhalueObjects\Metric,
    BestServedCold\PhalueObjects\Metric\DeclaredInterface,
    BestServedCold\PhalueObjects\Metric\DeclaredTrait,
    BestServedCold\PhalueObjects\Metric\IncludedFile,
    BestServedCold\PhalueObjects\Metric\DeclaredClass,
    BestServedCold\PhalueObjects\Metric\DefinedConstant,
    BestServedCold\PhalueObjects\Metric\DefinedFunction,
    Symfony\Component\Console\Helper\Table;

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
     * @var Output|Table
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

    public function render()
    {
        $this->output->render();
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
