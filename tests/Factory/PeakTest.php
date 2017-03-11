<?php

namespace BestServedCold\Benchmark\Factory;

use BestServedCold\Benchmark\TestCase;

class PeakTest extends TestCase
{
    public function testAllowedMethods()
    {
        $this->assertTrue(is_array(Peak::now()));
        $this->expectException(\Exception::class);
        Peak::diff();
    }
}
