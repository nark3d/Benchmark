<?php

namespace BestServedCold\Benchmark;

use BestServedCold\HTMLBuilder\Output as HTMLOutput;

class BenchMarkTest extends TestCase
{
    public function setUp()
    {
         Benchmark::reset();
    }

    public function testMain()
    {
        Benchmark::start('bob');
        Benchmark::stop('bob');
        $this->assertTrue(is_array(Benchmark::getMarkers('bob')));
    }

    public function testConstructor()
    {
        Benchmark::start('mary');
        Benchmark::stop('mary');
        $markers = Benchmark::get('mary');
        new Benchmark($markers);
        $this->assertEquals($markers, Benchmark::get());
    }

    public function testNoName()
    {
        $start = Benchmark::start();
        $stop  = Benchmark::stop();
        $this->assertEquals($start, $stop);
    }
}
