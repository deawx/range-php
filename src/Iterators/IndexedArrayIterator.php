<?php

declare(strict_types=1);

namespace Smoren\Range\Iterators;

use Smoren\Range\Interfaces\IndexedArrayInterface;
use Smoren\Range\Interfaces\RangeIteratorInterface;

/**
 * @template T
 * @implements RangeIteratorInterface<IndexedArrayInterface<T>>
 */
class IndexedArrayIterator implements RangeIteratorInterface
{
    /**
     * @var IndexedArrayInterface<T>
     */
    protected IndexedArrayInterface $array;
    /**
     * @var int
     */
    protected int $currentIndex;

    /**
     * @param IndexedArrayInterface<T> $array
     */
    public function __construct(IndexedArrayInterface $array)
    {
        $this->array = $array;
        $this->currentIndex = 0;
    }

    /**
     * {@inheritDoc}
     * @return mixed
     */
    public function current()
    {
        return $this->array[$this->currentIndex];
    }

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
        return isset($this->array[$this->currentIndex]);
    }

    /**
     * {@inheritDoc}
     */
    public function rewind(): void
    {
        $this->currentIndex = 0;
    }
}
