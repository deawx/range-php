<?php

namespace Smoren\Range\Traits;

use ArrayAccess;
use Countable;

/**
 * @property ArrayAccess<int, int|float>|Countable $range
 * @property int $currentIndex
 */
trait RangeIteratorTrait
{
    /**
     * @return void
     */
    public function next(): void
    {
        $this->currentIndex++;
    }

    /**
     * @return int
     */
    public function key(): int
    {
        return $this->currentIndex;
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        $count = $this->range->isInfinite() ? INF : $this->range->count();
        return $this->currentIndex >= 0 && $this->currentIndex < $count;
    }

    /**
     * @return void
     */
    public function rewind(): void
    {
        $this->currentIndex = 0;
    }
}
