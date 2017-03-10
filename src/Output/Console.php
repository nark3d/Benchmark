<?php

namespace BestServedCold\Benchmark\Output;

use BestServedCold\Benchmark\Benchmark;
use BestServedCold\Benchmark\Dependency;
use BestServedCold\PhalueObjects\Metric;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableSeparator;

/**
 * Class Console
 *
 * @package BestServedCold\Benchmark\Output
 */
class Console extends AbstractOutput implements OutputInterface
{
    /**
     * @param Benchmark      $benchmark
     * @param Table          $table
     * @param TableSeparator $tableSeparator
     */
    public static function output(Benchmark $benchmark, Table $table = null, TableSeparator $tableSeparator = null)
    {
        $table          = $table ?: Dependency::symfonyTable();
        $tableSeparator = $tableSeparator ?: Dependency::symfonyTableSeparator();
        $table->setHeaders(self::$headers);
        self::loopRows($table, $tableSeparator, $benchmark->getMarkers());
        $table->render();
    }

    /**
     * @param Table          $table
     * @param TableSeparator $tableSeparator
     * @param array          $rows
     */
    protected static function loopRows(Table $table, TableSeparator $tableSeparator, array $rows)
    {
        foreach($rows as $name => $row) {
            $table = static::addRow($table, $row, $name);
            $row === end($rows) ?: $table->addRow($tableSeparator);
        }
    }

    /**
     * @param  Table       $table
     * @param  array       $metrics
     * @param  bool|string $name
     * @return Table
     */
    protected static function addRow(Table $table, array $metrics, $name)
    {
        /** @var Metric $metric */
        foreach ($metrics as $metric) {
            $table->addRow(parent::populateRow($metric, $name));
        }

        return $table;
    }
}
