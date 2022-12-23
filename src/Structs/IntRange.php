<?php

declare(strict_types=1);

namespace Smoren\Range\Structs;

use Smoren\Range\Iterators\IntRangeIterator;
use Smoren\Range\Traits\RangeTrait;
use Smoren\Range\Exceptions\OutOfRangeException;
use Smoren\Range\Interfaces\RangeInterface;

/**
 * @implements RangeInterface<int>
 */
class IntRange implements RangeInterface
{
    use RangeTrait;

    /**
     * @var int
     */
    protected int $start;
    /**
     * @var int|null
     */
    protected ?int $size;
    /**
     * @var int
     */
    protected int $step;

    /**
     * @param int $start
     * @param int|null $size
     * @param int $step
     */
    public function __construct(int $start, ?int $size, int $step = 1)
    {
        $this->start = $start;
        $this->size = $size;
        $this->step = $step;
    }

    /**
     * {@inheritDoc}
     * @return int
     */
    public function offsetGet($offset): int
    {
        return (int)$this->_offsetGet($offset);
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator(): IntRangeIterator
    {
        return new IntRangeIterator($this);
    }
}
