<?php

declare(strict_types=1);

namespace Smoren\Range\Structs;

use Smoren\Range\Exceptions\OutOfRangeException;
use Smoren\Range\Iterators\FloatRangeIterator;
use Smoren\Range\Traits\RangeTrait;
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
     * {@inheritDoc}
     * @return float
     */
    public function offsetGet($offset): float
    {
        return $this->_offsetGet($offset);
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator(): FloatRangeIterator
    {
        return new FloatRangeIterator($this);
    }
}
