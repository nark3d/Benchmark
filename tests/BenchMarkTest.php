<?php

namespace BestServedCold\Benchmark;

use BestServedCold\Benchmark\Output\Console;
use BestServedCold\Benchmark\Output;
use BestServedCold\HTMLBuilder\Builder;
use BestServedCold\HTMLBuilder\Output as HTMLOutput;

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

        Benchmark::start('mary');
        for ($i = 1; $i <= 1000; $i++) {
            mt_rand(0, 10000000);
        }
        Benchmark::stop('mary');

        Output::output(Benchmark::get());
//        Html::output(Benchmark::get());

        exit;
        $table = new Builder('table');
        $thead = new Builder('thead');
        $tr = new Builder('tr');
        $td = new Builder('td', 'bob');
        $tr->child($td);
        $thead->child($tr);
        $table->child($thead);

        $compile = new Output($table);
        echo PHP_EOL . $compile->output();

        $table =
            Builder::section()->attribute('class', 'main')
                ->child(Builder::table()
                    ->child(Builder::thead()->attribute('id', 'arse')->attribute('style', 'color:red')
                        ->child(Builder::tr()->attribute('disabled')
                            ->child(Builder::th()->value('bob'))
                            ->child(Builder::th()->value('mary'))
                        )
                    )->child(Builder::tbody()->attribute('class', 'sex')
                        ->child(Builder::tr()
                            ->child(Builder::td()->value('harry'))
                        )->child(Builder::tr()
                            ->child(Builder::td()->value('sally'))
                        )
                    )
                )->child(Builder::form()->attribute('method', 'post')
                    ->child(Builder::label()->value('test label')
                        ->child(Builder::input()->attribute('type', 'text'))
                    )
                )->child(Builder::doctype())
                ->child(Builder::comment(' fuck you '));
        
        $compile = new Compile($table);
        echo PHP_EOL . $compile->output();
    }
}
