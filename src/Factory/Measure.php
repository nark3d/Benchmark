<?php

namespace BestServedCold\Benchmark\Factory;

use BestServedCold\PhalueObjects\Metric\DeclaredClass;
use BestServedCold\PhalueObjects\Metric\DeclaredInterface;
use BestServedCold\PhalueObjects\Metric\DeclaredTrait;
use BestServedCold\PhalueObjects\Metric\DefinedConstant;
use BestServedCold\PhalueObjects\Metric\DefinedFunction;
use BestServedCold\PhalueObjects\Metric\IncludedFile;
use BestServedCold\PhalueObjects\Metric\MemoryUsage;
use BestServedCold\PhalueObjects\Metric\MicroTime;

class Measure extends AbstractFactory
{
    /**
     * @var array
     */
    protected static $metrics  = [
        MicroTime::class,
        MemoryUsage::class,
        DeclaredInterface::class,
        DeclaredTrait::class,
        DefinedFunction::class,
        DefinedConstant::class,
        IncludedFile::class,
        DeclaredClass::class,
    ];

    protected static $allowedMethods = [ 'now', 'diff' ];
}
