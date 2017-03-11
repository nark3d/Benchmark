<?php

namespace BestServedCold\Benchmark\Factory;

use BestServedCold\Benchmark\TestCase;
use BestServedCold\PhalueObjects\Metric\MemoryUsage;

class MeasureTest extends TestCase
{
    public function testAllowedMethods()
    {
        $this->assertTrue(is_array(Measure::diff(Measure::now())));
        $this->expectException(\Exception::class);
        Measure::notAMethod();
    }

    public function testMetrics()
    {
        $metrics = [MemoryUsage::now()];
        Measure::metrics($metrics);
        $this->assertTrue(count(Measure::now()) === 1);
    }
}
