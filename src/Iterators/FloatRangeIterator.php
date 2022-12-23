<?php

declare(strict_types=1);

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

    /**
     * @var FloatRange
     */
    protected FloatRange $range;
    /**
     * @var int
     */
    protected int $currentIndex;

    /**
     * @param FloatRange $range
     */
    public function __construct(FloatRange $range)
    {
        $this->range = $range;
        $this->currentIndex = 0;
    }

    /**
     * {@inheritDoc}
     * @return float
     */
    public function current(): float
    {
        return $this->range[$this->currentIndex];
    }
}
