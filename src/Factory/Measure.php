<?php

namespace BestServedCold\Benchmark\Factory;

use BestServedCold\PhalueObjects\Metric\DeclaredClass,
    BestServedCold\PhalueObjects\Metric\DeclaredInterface,
    BestServedCold\PhalueObjects\Metric\DeclaredTrait,
    BestServedCold\PhalueObjects\Metric\DefinedConstant,
    BestServedCold\PhalueObjects\Metric\DefinedFunction,
    BestServedCold\PhalueObjects\Metric\IncludedFile,
    BestServedCold\PhalueObjects\Metric\MemoryUsage,
    BestServedCold\PhalueObjects\Metric\MicroTime;

/**
 * Class Measure
 *
 * @package BestServedCold\Benchmark\Factory
 * @method  static array diff(array $metrics))
 */
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

    /**
     * @var array
     */
    protected static $allowedMethods = [ 'now', 'diff' ];
}
