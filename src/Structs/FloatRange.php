<?php

namespace Smoren\Range\Structs;

use Smoren\Range\Iterators\FloatRangeIterator;
use Smoren\Range\Traits\RangeTrait;
use Smoren\Range\Exceptions\OutOfRangeException;
use Smoren\Range\Interfaces\RangeInterface;

/**
 * @implements RangeInterface<float>
 */
class FloatRange implements RangeInterface
{
    use RangeTrait;

    /**
     * @var float
     */
    protected float $start;
    /**
     * @var int|null
     */
    protected ?int $size;
    /**
     * @var float
     */
    protected float $step;

    /**
     * @param float $start
     * @param int|null $size
     * @param float $step
     */
    public function __construct(float $start, ?int $size, float $step = 1)
    {
        $this->start = $start;
        $this->size = $size;
        $this->step = $step;
    }

    /**
     * @param int|mixed $offset
     * @return float
     * @throws OutOfRangeException
     */
    public function offsetGet($offset): float
    {
        return $this->_offsetGet($offset);
    }

    /**
     * @return FloatRangeIterator
     */
    public function getIterator(): FloatRangeIterator
    {
        return new FloatRangeIterator($this);
    }
}
