<?php

namespace BestServedCold\Benchmark\Format;

use Symfony\Component\Console\Helper\Table;

interface FormatInterface
{
    /**
     * @param Table             $table
     * @param array             $metrics
     * @param string|boolean    $name
     * @return string
     */
    public static function row(Table $table, array $metrics, $name);
}
