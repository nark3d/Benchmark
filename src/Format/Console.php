<?php

namespace BestServedCold\Benchmark\Format;

use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableSeparator;

class Console extends AbstractFormat implements FormatInterface
{
    public static function row(Table $table, array $metrics, $name)
    {
        foreach ($metrics as $metric) {
            $table->addRow([$name, $metric->getShortName(), static::metricOutput($metric)]);
        }
        $table->addRow(new TableSeparator);

        return $table;
    }
}
