<?php

namespace Smoren\Range\Iterators;

use Smoren\Range\Interfaces\RangeIteratorInterface;
use Smoren\Range\Structs\IntRange;
use Smoren\Range\Traits\RangeIteratorTrait;

/**
 * @implements RangeIteratorInterface<int>
 */
class IntRangeIterator implements RangeIteratorInterface
{
    use RangeIteratorTrait;

    protected IntRange $range;
    protected int $currentIndex;

    public function __construct(IntRange $range)
    {
        $this->range = $range;
        $this->currentIndex = 0;
    }

    /**
     * @return int
     */
    public function current(): int
    {
        return $this->range[$this->currentIndex];
    }
}
