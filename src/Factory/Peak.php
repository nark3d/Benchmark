<?php

namespace BestServedCold\Benchmark\Factory;

use BestServedCold\PhalueObjects\Metric\PeakMemoryUsage;

class Peak extends AbstractFactory
{
    protected static $metrics = [
        PeakMemoryUsage::class
    ];

    protected static $allowedMethods = [ 'now' ];
}
