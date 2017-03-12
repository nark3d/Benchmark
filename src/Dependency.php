<?php

namespace BestServedCold\Benchmark;

use Symfony\Component\Console\Formatter\OutputFormatter,
    Symfony\Component\Console\Helper\Table,
    Symfony\Component\Console\Helper\TableSeparator,
    Symfony\Component\Console\Output\ConsoleOutput;

class Dependency
{
    /**
     * @return Table
     */
    public static function symfonyTable()
    {
        return new Table(self::symfonyConsoleOutput());
    }

    /**
     * @return ConsoleOutput
     */
    public static function symfonyConsoleOutput()
    {
        $output = new ConsoleOutput(1);
        $output->setFormatter(self::symfonyOutputFormatter());
        return $output;
    }

    /**
     * @return OutputFormatter
     */
    public static function symfonyOutputFormatter()
    {
        return new OutputFormatter(true);
    }

    /**
     * @return TableSeparator
     */
    public static function symfonyTableSeparator()
    {
        return new TableSeparator;
    }
}
