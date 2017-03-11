<?php

require_once('../vendor/autoload.php');

use BestServedCold\Benchmark\Benchmark;
use BestServedCold\Benchmark\Output;

Benchmark::start();
for ($i = 0; $i <= 100; $i++ ) {
    mt_rand(1, 1000);
}
Benchmark::stop();
Output::output(Benchmark::get())->render();

Benchmark::reset();
Benchmark::start('bob');
$a = str_repeat('Hello', 24000);
define('FOO', 'bar');
Benchmark::stop('bob');
Benchmark::start('mary');
require_once('./SomeClass.php');
sleep(1);
Benchmark::stop('mary');

Output::output(Benchmark::get())->render();

Benchmark::reset();
Benchmark::start('susan');
require_once('./SomeTrait.php');
Benchmark::stop('susan');
Output::output(Benchmark::get(), 'apache')->render();
