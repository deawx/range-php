# range

![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/smoren/range)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Smoren/range-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Smoren/range-php/?branch=master)
[![Coverage Status](https://coveralls.io/repos/github/Smoren/range-php/badge.svg?branch=master)](https://coveralls.io/github/Smoren/range-php?branch=master)
![Build and test](https://github.com/Smoren/range-php/actions/workflows/test_master.yml/badge.svg)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

Python-like range iterator for PHP

### How to install to your project
```
composer require smoren/range
```

### Unit testing
```
composer install
composer test-init
composer test
```

### Usage

```php
use Smoren\Range\Structs\IntRange;
use Smoren\Range\Structs\FloatRange;

/* Simple int range */
$range = new IntRange(1, 3, 2); // (from, size, step)
var_dump($range->isInfinite()); // false

foreach($range as $value) {
    echo "{$value} ";
}
// out: 1 3 5

var_dump($range[0]); // 1
var_dump($range[1]); // 3
var_dump($range[2]); // 5

var_dump($range[4]); // 1
var_dump($range[5]); // 3
var_dump($range[6]); // 5

var_dump($range[-1]); // 5
var_dump($range[-2]); // 3
var_dump($range[-3]); // 1

/* Infinite int range */
$range = new IntRange(1, null, 2);
var_dump($range->isInfinite()); // true

foreach($range as $i => $value) {
    echo "{$value} ";
    if($i > 100) break;
}
// out: 1 3 5 7 9 11 13...

/* Float range */
$range = new FloatRange(1.1, 3, 2.1);
var_dump($range->isInfinite()); // false

foreach($range as $value) {
    echo "{$value} ";
}
// out: 1.1 3.2 5.3
```
