<?php

namespace BestServedCold\Benchmark\Output;

use BestServedCold\Benchmark\Benchmark,
    BestServedCold\Benchmark\TestCase,
    BestServedCold\Benchmark\Output;

class HtmlTest extends TestCase
{
    public function testRender()
    {
        Benchmark::reset();
        Benchmark::start();
        Benchmark::stop();

        ob_start();
        Output::output(Benchmark::get(), 'apache')->render();
        $string = ob_get_contents();
        ob_end_clean();

        $this->assertTrue(is_string($string));
    }
}
