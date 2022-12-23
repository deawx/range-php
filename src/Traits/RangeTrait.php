<?php

declare(strict_types=1);

namespace Smoren\Range\Traits;

use Smoren\Range\Exceptions\OutOfRangeException;
use Smoren\Range\Exceptions\ReadOnlyException;

trait RangeTrait
{
    /**
     * @param int|mixed $offset
     * @return bool
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
     * @param int|mixed $offset
     * @param mixed $value
     * @return void
     * @throws ReadOnlyException
     */
    public function offsetSet($offset, $value): void
    {
        throw new ReadOnlyException();
    }

    /**
     * @param int|mixed $offset
     * @return void
     * @throws ReadOnlyException
     */
    public function offsetUnset($offset): void
    {
        throw new ReadOnlyException();
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return $this->size ?? -1;
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

    /**
     * @return bool
     */
    public function isInfinite(): bool
    {
        return $this->size === null;
    }
}
