<?php

declare(strict_types=1);

namespace Smoren\Range\Traits;

use Smoren\Range\Exceptions\OutOfRangeException;
use Smoren\Range\Exceptions\ReadOnlyException;
use Smoren\Range\Interfaces\RangeInterface;

/**
 * @implements RangeInterface<mixed>
 */
trait RangeTrait
{
    /**
     * {@inheritDoc}
     */
    public function offsetExists($offset): bool
    {
        if(!is_int($offset)) {
            return false;
        }

        if(!$this->isInfinite()) {
            if($offset >= 0) {
                return $offset < count($this);
            }
            return abs($offset) <= count($this);
        }

        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function offsetSet($offset, $value): void
    {
        throw new ReadOnlyException();
    }

    /**
     * {@inheritDoc}
     */
    public function offsetUnset($offset): void
    {
        throw new ReadOnlyException();
    }

    /**
     * {@inheritDoc}
     */
    public function count(): int
    {
        return $this->size ?? -1;
    }

    /**
     * {@inheritDoc}
     */
    public function isInfinite(): bool
    {
        return $this->size === null;
    }

    /**
     * @param int|mixed $offset
     * @return float
     * @throws OutOfRangeException
     */
    protected function _offsetGet($offset): float
    {
        if(!$this->offsetExists($offset)) {
            throw new OutOfRangeException();
        }

        if($this->isInfinite()) {
            return $this->start + $offset * $this->step;
        }

        if($offset < 0) {
            $offset = $this->size + ($offset % $this->size);
        }

        return $this->start + ($offset % $this->size) * $this->step;
    }
}
