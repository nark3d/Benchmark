<?php

namespace BestServedCold\Benchmark;

use BestServedCold\Benchmark\Output\Console;
use BestServedCold\Benchmark\Output\Html;

class OutputTest extends TestCase
{
    public function setUp()
    {
        Benchmark::reset();
        Benchmark::start('bob');
        Benchmark::stop('bob');
    }
    
    public function testOutputException()
    {
        $this->expectException(\Exception::class);
        Output::output(Benchmark::get(), 'thisDefinittelyDoesNotExist');
    }

    /**
     * @outputBuffering enabled
     */
    public function testReturnType()
    {
        $benchmark = Benchmark::get();
        $this->assertInstanceOf(Console::class, Output::output($benchmark, 'cli'));
        $this->assertInstanceOf(Html::class, Output::output($benchmark, 'apache'));
    }

}
