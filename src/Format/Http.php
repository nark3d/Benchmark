<?php

namespace BestServedCold\Benchmark\Format;

use BestServedCold\Benchmark\Benchmark;

class Http implements FormatInterface
{
    public static function output(Benchmark $benchmark)
    {
        var_dump($benchmark->get());
    }

}
