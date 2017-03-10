<?php

namespace BestServedCold\Benchmark\Output;

use BestServedCold\Benchmark\Benchmark;
use BestServedCold\HTMLBuilder\Builder;
use BestServedCold\HTMLBuilder\Element;
use BestServedCold\HTMLBuilder\Output;
use BestServedCold\PhalueObjects\Metric;

class Html extends AbstractOutput implements OutputInterface
{
    public static function output(Benchmark $benchmark)
    {
        $table = Builder::table()
            ->child(self::thead(self::$headers, Builder::thead()))
            ->child(self::tbody($benchmark, Builder::tbody()));

        echo (new Output($table))->get();
    }

    private static function tbody(Benchmark $benchmark, Element $tbody)
    {
        foreach ($benchmark->getMarkers() as $name => $marker)
        {
            /** @var Metric $metric */
            foreach ($marker as $metric) {
                $tr = Builder::tr();
                $tr->child(Builder::td()->value($name));
                $tr->child(Builder::td()->value($metric->getShortName()));
                $tr->child(Builder::td()->value(static::metricOutput($metric)));
                $tbody->child($tr);
            }
        }

        return $tbody;
    }

    private static function thead(array $headers, Element $head)
    {
        $tr = Builder::tr();
        foreach ($headers as $header) {
            $tr->child(Builder::th()->value($header));
        }


        return $head->child($tr);
    }
}
