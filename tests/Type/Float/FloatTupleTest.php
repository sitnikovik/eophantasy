<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Test\Type\Float;

use Eophantasy\Type\Float\FloatTuple;
use Eophantasy\Type\Float\FloatValue;
use PHPUnit\Framework\TestCase;

/**
 * A class for testing the FloatTuple class.
 * 
 * @covers FloatTuple
 */
class FloatTupleTest extends TestCase
{
    /**
     * Tests the construct method.
     * 
     * @return void
     * @covers FloatTuple::__construct
     */
    public function testConstruct(): void
    {
        $this->assertInstanceOf(
            FloatTuple::class,
            new FloatTuple(
                new FloatValue(1.1),
                new FloatValue(2.2),
                new FloatValue(3.3)
            )
        );
    }

    /**
     * Tests the has method.
     * 
     * @return void
     * @covers FloatTuple::has
     */
    public function testHas(): void
    {
        $tuple = new FloatTuple(
            new FloatValue(1.1),
            new FloatValue(2.2),
            new FloatValue(3.3)
        );

        $this->assertTrue($tuple->has(new FloatValue(1.1)));
        $this->assertTrue($tuple->has(new FloatValue(2.2)));
        $this->assertTrue($tuple->has(new FloatValue(3.3)));
        $this->assertFalse($tuple->has(new FloatValue(4.4)));
    }

    /**
     * Tests the count method.
     * 
     * @return void
     * @covers FloatTuple::count
     */
    public function testCount(): void
    {
        $this->assertEquals(
            3,
            (new FloatTuple(
                new FloatValue(1.1),
                new FloatValue(2.2),
                new FloatValue(3.3)
            ))->count()
        );
    }

    /**
     * Tests the current method.
     * 
     * @return void
     * @covers FloatTuple::current
     */
    public function testCurrent(): void
    {
        $tuple = new FloatTuple(
            new FloatValue(1.1),
            new FloatValue(2.2),
            new FloatValue(3.3)
        );
        $this->assertEquals(
            new FloatValue(1.1),
            $tuple->current()
        );

        $tuple->next();
        $this->assertEquals(
            new FloatValue(2.2),
            $tuple->current()
        );

        $tuple->next();
        $this->assertEquals(
            new FloatValue(3.3),
            $tuple->current()
        );
    }

    /**
     * Tests the key method.
     * 
     * @return void
     * @covers FloatTuple::key
     */
    public function testKey(): void
    {
        $tuple = new FloatTuple(
            new FloatValue(1.1),
            new FloatValue(2.2),
            new FloatValue(3.3)
        );
        $this->assertEquals(0, $tuple->key());

        $tuple->next();
        $this->assertEquals(1, $tuple->key());

        $tuple->next();
        $this->assertEquals(2, $tuple->key());
    }

    /**
     * Tests the next method.
     * 
     * @return void
     * @covers FloatTuple::next
     */
    public function testNext(): void
    {
        $tuple = new FloatTuple(
            new FloatValue(1.1),
            new FloatValue(2.2),
            new FloatValue(3.3)
        );
        $this->assertEquals(
            new FloatValue(1.1),
            $tuple->current()
        );

        $tuple->next();
        $this->assertEquals(
            new FloatValue(2.2),
            $tuple->current()
        );

        $tuple->next();
        $this->assertEquals(
            new FloatValue(3.3),
            $tuple->current()
        );
    }

    /**
     * Tests the rewind method.
     * 
     * @return void
     * @covers FloatTuple::rewind
     */
    public function testRewind(): void
    {
        $tuple = new FloatTuple(
            new FloatValue(1.1),
            new FloatValue(2.2),
            new FloatValue(3.3)
        );
        $tuple->next();
        $tuple->next();
        $this->assertEquals(
            new FloatValue(3.3),
            $tuple->current()
        );

        $tuple->rewind();
        $this->assertEquals(
            new FloatValue(1.1),
            $tuple->current()
        );
    }

    /**
     * Tests the valid method.
     * 
     * @return void
     * @covers FloatTuple::valid
     */
    public function testValid(): void
    {
        $tuple = new FloatTuple(
            new FloatValue(1.1),
            new FloatValue(2.2),
            new FloatValue(3.3)
        );
        $this->assertTrue($tuple->valid());

        $tuple->next();
        $this->assertTrue($tuple->valid());

        $tuple->next();
        $this->assertTrue($tuple->valid());

        $tuple->next();
        $this->assertFalse($tuple->valid());
    }
}