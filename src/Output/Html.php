<?php

namespace BestServedCold\Benchmark\Output;

use BestServedCold\Benchmark\Benchmark;
use BestServedCold\HTMLBuilder\Output;
use BestServedCold\HTMLBuilder\Html as HtmlBuilder;
use BestServedCold\PhalueObjects\Metric;
use BestServedCold\HTMLBuilder\Html\Node;

/**
 * Class Html
 *
 * @package BestServedCold\Benchmark\Output
 */
class Html extends AbstractOutput implements HTMLOutputInterface
{
    /**
     * @param  Benchmark $benchmark
     * @return $this
     */
    public static function output(Benchmark $benchmark)
    {
        return new static((new Output(
                HtmlBuilder::table(self::tHead(), self::tBody($benchmark)))
        ));
    }

    /**
     * @return Node
     */
    private static function tHead()
    {
        return HtmlBuilder::thead(HtmlBuilder::tr(self::tHeadMap()));
    }

    /**
     * @return array
     */
    private static function tHeadMap()
    {
        return array_map(function($header) {
            return HtmlBuilder::th()->content($header); }, self::$headers
        );
    }

    /**
     * @param  Benchmark $benchmark
     * @return Node
     */
    private static function tBody(Benchmark $benchmark)
    {
        return HtmlBuilder::tbody(self::tBodyMap($benchmark)
        );
    }

    /**
     * @param  Benchmark $benchmark
     * @return array
     */
    private static function tBodyMap(Benchmark $benchmark)
    {
        return array_map(function($name, $value) {
            return array_map(function($metric) use ($name) {
                return self::tBodyRow($metric, $name);
            }, $value);
        }, array_keys($benchmark->getMarkers()), $benchmark->getMarkers());
    }

    /**
     * @param  Metric $metric
     * @param  string $name
     * @return Node
     */
    private static function tBodyRow(Metric $metric, $name)
    {
         return HtmlBuilder::tr(
             HtmlBuilder::td()->content($name),
             HtmlBuilder::td()->content($metric->getShortName()),
             HtmlBuilder::td()->content(static::metricOutput($metric))
         );
    }
}
