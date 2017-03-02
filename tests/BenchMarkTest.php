<?php

namespace BestServedCold\Benchmark;

class BenchMarkTest extends TestCase
{
    public function testStart()
    {
        BenchMark::start('bob');
        require_once('./tests/SomeClass.php');
        require_once('./tests/SomeInterface.php');
        require_once('./tests/SomeTrait.php');
        require_once('./tests/SomeFunction.php');

        define('SOME_CONSTANT', true);
        BenchMark::stop('bob');

//        echo Benchmark::human('bob');

        Benchmark::start('mary');
        for ($i = 1; $i <= 1000; $i++) {
            mt_rand(0, 10000000);
        }
        Benchmark::stop('mary');

//        var_dump(Benchmark::get());
//        echo Benchmark::human();
        echo Benchmark::output();
    }
}
