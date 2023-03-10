<?php

declare(strict_types=1);

namespace Smoren\Range\Tests\Unit;

use Codeception\Test\Unit;
use Smoren\Range\Exceptions\OutOfRangeException;
use Smoren\Range\Exceptions\ReadOnlyException;
use Smoren\Range\Structs\IntRange;

class IntRangeTest extends Unit
{
    public function testSimple()
    {
        $range = new IntRange(0, 3, 1);
        $this->assertCount(3, $range);
        $this->assertFalse($range->isInfinite());

        $this->assertEquals(0, $range[0]);
        $this->assertEquals(1, $range[1]);
        $this->assertEquals(2, $range[2]);
        $this->checkIsOffsetOutOfRange($range, 3);

        $this->assertEquals(2, $range[-1]);
        $this->assertEquals(1, $range[-2]);
        $this->assertEquals(0, $range[-3]);
        $this->checkIsOffsetOutOfRange($range, -4);

        $this->checkIsOffsetOutOfRange($range, null);
        $this->checkIsOffsetOutOfRange($range, 'test');
        $this->checkIsOffsetOutOfRange($range, '');
        $this->checkIsOffsetOutOfRange($range, 10.5);
        $this->checkIsOffsetOutOfRange($range, '10');

        try {
            $range[0] = 1;
            $this->fail();
        } catch(ReadOnlyException $e) {
        }

        try {
            unset($range[0]);
            $this->fail();
        } catch(ReadOnlyException $e) {
        }

        $this->assertEquals([0, 1, 2], iterator_to_array($range));
        $this->assertEquals([0, 1, 2], iterator_to_array($range));
    }

    public function testHard()
    {
        $range = new IntRange(1, 3, 2);
        $this->assertCount(3, $range);
        $this->assertFalse($range->isInfinite());

        $this->assertEquals(1, $range[0]);
        $this->assertEquals(3, $range[1]);
        $this->assertEquals(5, $range[2]);
        $this->checkIsOffsetOutOfRange($range, 3);

        $this->assertEquals(5, $range[-1]);
        $this->assertEquals(3, $range[-2]);
        $this->assertEquals(1, $range[-3]);
        $this->checkIsOffsetOutOfRange($range, -4);

        $this->checkIsOffsetOutOfRange($range, null);
        $this->checkIsOffsetOutOfRange($range, 'test');
        $this->checkIsOffsetOutOfRange($range, '');
        $this->checkIsOffsetOutOfRange($range, 10.5);
        $this->checkIsOffsetOutOfRange($range, '10');

        try {
            $range[0] = 1;
            $this->fail();
        } catch(ReadOnlyException $e) {
        }

        try {
            unset($range[0]);
            $this->fail();
        } catch(ReadOnlyException $e) {
        }

        $this->assertEquals([1, 3, 5], iterator_to_array($range));
        $this->assertEquals([1, 3, 5], iterator_to_array($range));
    }

    public function testInfinite()
    {
        $range = new IntRange(1, null, 2);
        $this->assertEquals(-1, $range->count());
        $this->assertTrue($range->isInfinite());
        $this->assertEquals(1, $range[0]);
        $this->assertEquals(3, $range[1]);
        $this->assertEquals(5, $range[2]);
        $this->assertEquals(7, $range[3]);

        $this->assertEquals(-1, $range[-1]);
        $this->assertEquals(-3, $range[-2]);
        $this->assertEquals(-5, $range[-3]);
        $this->assertEquals(-7, $range[-4]);

        $this->checkIsOffsetOutOfRange($range, null);
        $this->checkIsOffsetOutOfRange($range, 'test');
        $this->checkIsOffsetOutOfRange($range, '');
        $this->checkIsOffsetOutOfRange($range, 10.5);
        $this->checkIsOffsetOutOfRange($range, '10');

        $result = [];
        foreach($range as $i => $value) {
            $result[] = $value;
            if($i === 100) {
                break;
            }
        }
        $this->assertEquals(range(1, 201, 2), $result);
    }

    protected function checkIsOffsetOutOfRange(IntRange $range, $offset): void
    {
        try {
            $range[$offset];
            $this->fail();
        } catch(OutOfRangeException $e) {
        }
    }
}
