# Benchmark

## Install
```shell
$ composer require best-served-cold/benchmark
```

## Usage
Call in the Benchmark and Output classes
```php
use BestServedCold\Benchmark\Benchmark;
use BestServedCold\Benchmark\Output;
```

Then benchmark a bunch of code:
```php
Benchmark::start();
for ($i = 0; $i <= 100; $i++ ) {
    mt_rand(1, 1000);
}
Benchmark::stop();
Output::output(Benchmark::get())->render();
```

Returns something like this:
```shell
+---------------+-------------------+--------------------+
| Name          | Metric            | Value              |
+---------------+-------------------+--------------------+
| 58c4302514614 | MicroTime         | 0.0022561550140381 |
| 58c4302514614 | MemoryUsage       | 160.05 KB          |
| 58c4302514614 | DeclaredInterface | 0                  |
| 58c4302514614 | DeclaredTrait     | 2                  |
| 58c4302514614 | DefinedFunction   | 0                  |
| 58c4302514614 | DefinedConstant   | 0                  |
| 58c4302514614 | IncludedFile      | 1                  |
| 58c4302514614 | DeclaredClass     | 0                  |
| 58c4302514614 | PeakMemoryUsage   | 1.54 MB            |
+---------------+-------------------+--------------------+
```

As no $name argument is specified, a hashed name will be given 
as means of identification.

## Naming benchmarks
```php
Benchmark::reset(); // Clear existing benchmarks
Benchmark::start('bob');
$a = str_repeat('Hello', 24000);
define('FOO', 'bar');
Benchmark::stop('bob');
Benchmark::start('mary');
require_once('./SomeClass.php');
sleep(1);
Benchmark::stop('mary');
```

Returns something like:
```shell
+------+-------------------+--------------------+
| Name | Metric            | Value              |
+------+-------------------+--------------------+
| bob  | MicroTime         | 0.0014297962188721 |
| bob  | MemoryUsage       | 191.77 KB          |
| bob  | DeclaredInterface | 0                  |
| bob  | DeclaredTrait     | 0                  |
| bob  | DefinedFunction   | 0                  |
| bob  | DefinedConstant   | 1                  |
| bob  | IncludedFile      | 0                  |
| bob  | DeclaredClass     | 0                  |
| bob  | PeakMemoryUsage   | 2.18 MB            |
+------+-------------------+--------------------+
| mary | MicroTime         | 1.0012910366058    |
| mary | MemoryUsage       | 75.48 KB           |
| mary | DeclaredInterface | 0                  |
| mary | DeclaredTrait     | 0                  |
| mary | DefinedFunction   | 0                  |
| mary | DefinedConstant   | 0                  |
| mary | IncludedFile      | 1                  |
| mary | DeclaredClass     | 1                  |
| mary | PeakMemoryUsage   | 2.18 MB            |
+------+-------------------+--------------------+
```

## Specifying output interface

```php 
Benchmark::reset();
Benchmark::start('susan');
require_on
ce('./SomeTrait.php');
Benchmark::stop('susan');
Output::output(Benchmark::get(), 'apache')->render();
```

Returns something like:
<table>
    <thead>
        <tr>
            <th>
                Name
            </th>
            <th>
                Metric
            </th>
            <th>
                Value
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                susan
            </td>
            <td>
                MicroTime
            </td>
            <td>
                0.0014090538024902
            </td>
        </tr>
        <tr>
            <td>
                susan
            </td>
            <td>
                MemoryUsage
            </td>
            <td>
                76.03 KB
            </td>
        </tr>
        <tr>
            <td>
                susan
            </td>
            <td>
                DeclaredInterface
            </td>
            <td>
            </td>
        </tr>
        <tr>
            <td>
                susan
            </td>
            <td>
                DeclaredTrait
            </td>
            <td>
                1
            </td>
        </tr>
        <tr>
            <td>
                susan
            </td>
            <td>
                DefinedFunction
            </td>
            <td>
            </td>
        </tr>
        <tr>
            <td>
                susan
            </td>
            <td>
                DefinedConstant
            </td>
            <td>
            </td>
        </tr>
        <tr>
            <td>
                susan
            </td>
            <td>
                IncludedFile
            </td>
            <td>
                1
            </td>
        </tr>
        <tr>
            <td>
                susan
            </td>
            <td>
                DeclaredClass
            </td>
            <td>
            </td>
        </tr>
        <tr>
            <td>
                susan
            </td>
            <td>
                PeakMemoryUsage
            </td>
            <td>
                2.18 MB
            </td>
        </tr>
    </tbody>
</table>
