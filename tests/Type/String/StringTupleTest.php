<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Test\Type\String;

use Eophantasy\Type\String\StringTuple;
use Eophantasy\Type\String\StringValue;
use PHPUnit\Framework\TestCase;

/**
 * A class for testing the StringTuple class.
 * 
 * @covers StringTuple
 */
class StringTupleTest extends TestCase
{
    /**
     * Tests the construct method.
     * 
     * @return void
     * @covers StringTuple::__construct
     */
    public function testConstruct(): void
    {
        $this->assertInstanceOf(
            StringTuple::class,
            new StringTuple(
                new StringValue('a'),
                new StringValue('b'),
                new StringValue('c')
            )
        );
    }

    /**
     * Tests the has method.
     * 
     * @return void
     * @covers StringTuple::has
     */
    public function testHas(): void
    {
        $tuple = new StringTuple(
            new StringValue('a'),
            new StringValue('b'),
            new StringValue('c')
        );

        $this->assertTrue($tuple->has(new StringValue('a')));
        $this->assertTrue($tuple->has(new StringValue('b')));
        $this->assertTrue($tuple->has(new StringValue('c')));
        $this->assertFalse($tuple->has(new StringValue('d')));
    }

    /**
     * Tests the count method.
     * 
     * @return void
     * @covers StringTuple::count
     */
    public function testCount(): void
    {
        $this->assertEquals(
            3,
            (new StringTuple(
                new StringValue('a'),
                new StringValue('b'),
                new StringValue('c')
            ))->count()
        );
    }

    /**
     * Tests the current method.
     * 
     * @return void
     * @covers StringTuple::current
     */
    public function testCurrent(): void
    {
        $tuple = new StringTuple(
            new StringValue('a'),
            new StringValue('b'),
            new StringValue('c')
        );

        $this->assertEquals(new StringValue('a'), $tuple->current());

        $tuple->next();
        $this->assertEquals(new StringValue('b'), $tuple->current());

        $tuple->next();
        $this->assertEquals(new StringValue('c'), $tuple->current());
    }

    /**
     * Tests the key method.
     * 
     * @return void
     * @covers StringTuple::key
     */
    public function testKey(): void
    {
        $tuple = new StringTuple(
            new StringValue('a'),
            new StringValue('b'),
            new StringValue('c')
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
     * @covers StringTuple::next
     */
    public function testNext(): void
    {
        $tuple = new StringTuple(
            new StringValue('a'),
            new StringValue('b'),
            new StringValue('c')
        );

        $this->assertEquals(new StringValue('a'), $tuple->current());

        $tuple->next();
        $this->assertEquals(new StringValue('b'), $tuple->current());

        $tuple->next();
        $this->assertEquals(new StringValue('c'), $tuple->current());
    }

    /**
     * Tests the rewind method.
     * 
     * @return void
     * @covers StringTuple::rewind
     */
    public function testRewind(): void
    {
        $tuple = new StringTuple(
            new StringValue('a'),
            new StringValue('b'),
            new StringValue('c')
        );

        $this->assertEquals(new StringValue('a'), $tuple->current());

        $tuple->next();
        $this->assertEquals(new StringValue('b'), $tuple->current());

        $tuple->next();
        $this->assertEquals(new StringValue('c'), $tuple->current());
    }

    /**
     * Tests the valid method.
     * 
     * @return void
     * @covers StringTuple::valid
     */
    public function testValid(): void
    {
        $tuple = new StringTuple(
            new StringValue('a'),
            new StringValue('b'),
            new StringValue('c')
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