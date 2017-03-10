<?php

namespace BestServedCold\Benchmark\Factory;

use BestServedCold\PhalueObjects\Metric\PeakMemoryUsage;

/**
 * Class Peak
 *
 * @package BestServedCold\Benchmark\Factory
 */
class Peak extends AbstractFactory
{
    /**
     * @var array
     */
    protected static $metrics = [
        PeakMemoryUsage::class
    ];

    /**
     * @var array
     */
    protected static $allowedMethods = [ 'now' ];
}
