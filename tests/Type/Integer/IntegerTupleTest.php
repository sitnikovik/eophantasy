<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Test\Type\Integer;

use Eophantasy\Type\Integer\IntegerTuple;
use Eophantasy\Type\Integer\IntegerValue;
use PHPUnit\Framework\TestCase;

/**
 * A class for testing the IntegerTuple class.
 * 
 * @covers IntegerTuple
 */
class IntegerTupleTest extends TestCase
{
    /**
     * Tests the construct method.
     * 
     * @return void
     * @covers IntegerTuple::__construct
     */
    public function testConstruct(): void
    {
        $this->assertInstanceOf(
            IntegerTuple::class,
            new IntegerTuple(
                new IntegerValue(1.1),
                new IntegerValue(2.2),
                new IntegerValue(3.3)
            )
        );
    }

    /**
     * Tests the has method.
     * 
     * @return void
     * @covers IntegerTuple::has
     */
    public function testHas(): void
    {
        $tuple = new IntegerTuple(
            new IntegerValue(1.1),
            new IntegerValue(2.2),
            new IntegerValue(3.3)
        );

        $this->assertTrue($tuple->has(new IntegerValue(1.1)));
        $this->assertTrue($tuple->has(new IntegerValue(2.2)));
        $this->assertTrue($tuple->has(new IntegerValue(3.3)));
        $this->assertFalse($tuple->has(new IntegerValue(4.4)));
    }

    /**
     * Tests the count method.
     * 
     * @return void
     * @covers IntegerTuple::count
     */
    public function testCount(): void
    {
        $this->assertEquals(
            3,
            (new IntegerTuple(
                new IntegerValue(1.1),
                new IntegerValue(2.2),
                new IntegerValue(3.3)
            ))->count()
        );
    }

    /**
     * Tests the current method.
     * 
     * @return void
     * @covers IntegerTuple::current
     */
    public function testCurrent(): void
    {
        $tuple = new IntegerTuple(
            new IntegerValue(1.1),
            new IntegerValue(2.2),
            new IntegerValue(3.3)
        );
        $this->assertEquals(
            new IntegerValue(1.1),
            $tuple->current()
        );

        $tuple->next();
        $this->assertEquals(
            new IntegerValue(2.2),
            $tuple->current()
        );

        $tuple->next();
        $this->assertEquals(
            new IntegerValue(3.3),
            $tuple->current()
        );
    }

    /**
     * Tests the key method.
     * 
     * @return void
     * @covers IntegerTuple::key
     */
    public function testKey(): void
    {
        $tuple = new IntegerTuple(
            new IntegerValue(1.1),
            new IntegerValue(2.2),
            new IntegerValue(3.3)
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
     * @covers IntegerTuple::next
     */
    public function testNext(): void
    {
        $tuple = new IntegerTuple(
            new IntegerValue(1.1),
            new IntegerValue(2.2),
            new IntegerValue(3.3)
        );
        $this->assertEquals(
            new IntegerValue(1.1),
            $tuple->current()
        );

        $tuple->next();
        $this->assertEquals(
            new IntegerValue(2.2),
            $tuple->current()
        );

        $tuple->next();
        $this->assertEquals(
            new IntegerValue(3.3),
            $tuple->current()
        );
    }

    /**
     * Tests the rewind method.
     * 
     * @return void
     * @covers IntegerTuple::rewind
     */
    public function testRewind(): void
    {
        $tuple = new IntegerTuple(
            new IntegerValue(1.1),
            new IntegerValue(2.2),
            new IntegerValue(3.3)
        );
        $tuple->next();
        $tuple->next();
        $this->assertEquals(
            new IntegerValue(3.3),
            $tuple->current()
        );

        $tuple->rewind();
        $this->assertEquals(
            new IntegerValue(1.1),
            $tuple->current()
        );
    }

    /**
     * Tests the valid method.
     * 
     * @return void
     * @covers IntegerTuple::valid
     */
    public function testValid(): void
    {
        $tuple = new IntegerTuple(
            new IntegerValue(1.1),
            new IntegerValue(2.2),
            new IntegerValue(3.3)
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