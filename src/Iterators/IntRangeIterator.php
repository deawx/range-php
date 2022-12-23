<?php

declare(strict_types=1);

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

    /**
     * @var IntRange
     */
    protected IntRange $range;
    /**
     * @var int
     */
    protected int $currentIndex;

    /**
     * @param IntRange $range
     */
    public function __construct(IntRange $range)
    {
        $this->range = $range;
        $this->currentIndex = 0;
    }

    /**
     * {@inheritDoc}
     * @return int
     */
    public function current(): int
    {
        return $this->range[$this->currentIndex];
    }
}
