<?php

namespace Smoren\Range\Interfaces;

use ArrayAccess;
use Countable;
use IteratorAggregate;

/**
 * @template T
 * @extends ArrayAccess<int, T>
 * @extends IteratorAggregate<int, T>
 */
interface RangeInterface extends ArrayAccess, Countable, IteratorAggregate
{
    /**
     * @return bool
     */
    public function isInfinite(): bool;
}
