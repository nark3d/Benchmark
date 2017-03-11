<?php

namespace BestServedCold\Benchmark;

use Symfony\Component\Console\Formatter\OutputFormatter;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Output\ConsoleOutput;


class DependencyTest extends TestCase
{
    public function testSymfonyTable()
    {
        $this->assertInstanceOf(Table::class, Dependency::symfonyTable());
    }

    public function testSymfonyConsoleOutput()
    {
//        $this->assertInstanceOf(ConsoleOutput::class, Dependency::symfonyConsoleOutput());
    }

    public function testSymfonyOutputFormatter()
    {
        $this->assertInstanceOf(OutputFormatter::class, Dependency::symfonyOutputFormatter());
    }

    public function testSymfonyTableSeparator()
    {
        $this->assertInstanceOf(TableSeparator::class, Dependency::symfonyTableSeparator());
    }
}
