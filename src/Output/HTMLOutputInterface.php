<?php

namespace BestServedCold\Benchmark\Output;

use BestServedCold\Benchmark\Benchmark;

/**
 * Interface OutputInterface
 *
 * @package BestServedCold\Benchmark\Output
 */
interface HTMLOutputInterface
{
    /**
     * @return mixed
     */
    public function render();

    /**
     * @param  Benchmark $benchmark
     * @return $this
     */
    public static function output(Benchmark $benchmark);
}

