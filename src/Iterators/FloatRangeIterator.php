<?php

namespace Smoren\Range\Iterators;

use Smoren\Range\Interfaces\RangeIteratorInterface;
use Smoren\Range\Structs\FloatRange;
use Smoren\Range\Traits\RangeIteratorTrait;

/**
 * @implements RangeIteratorInterface<float>
 */
class FloatRangeIterator implements RangeIteratorInterface
{
    use RangeIteratorTrait;

    protected FloatRange $range;
    protected int $currentIndex;

    public function __construct(FloatRange $range)
    {
        $this->range = $range;
        $this->currentIndex = 0;
    }

    /**
     * @return float
     */
    public function current(): float
    {
        return $this->range[$this->currentIndex];
    }
}
