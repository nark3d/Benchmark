<?php

namespace BestServedCold\Benchmark;

use Symfony\Component\Console\Formatter\OutputFormatter;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Output\ConsoleOutput;

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
        $output = new ConsoleOutput(true);
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
