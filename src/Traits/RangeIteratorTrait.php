<?php

declare(strict_types=1);

namespace Smoren\Range\Traits;

use ArrayAccess;
use Countable;
use Smoren\Range\Interfaces\RangeIteratorInterface;

/**
 * @implements RangeIteratorInterface<mixed>
 * @property ArrayAccess<int, int|float>|Countable $range
 * @property int $currentIndex
 */
trait RangeIteratorTrait
{
    /**
     * {@inheritDoc}
     */
    public function next(): void
    {
        $this->currentIndex++;
    }

    /**
     * {@inheritDoc}
     */
    public function key(): int
    {
        return $this->currentIndex;
    }

    /**
     * {@inheritDoc}
     */
    public function valid(): bool
    {
        $count = $this->range->isInfinite() ? INF : $this->range->count();
        return $this->currentIndex >= 0 && $this->currentIndex < $count;
    }

    /**
     * {@inheritDoc}
     */
    public function rewind(): void
    {
        $this->currentIndex = 0;
    }
}
