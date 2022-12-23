<?php

declare(strict_types=1);

namespace Smoren\Range\Interfaces;

use Iterator;

/**
 * @template T
 * @extends Iterator<int, T>
 */
interface RangeIteratorInterface extends Iterator
{
}
