<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Types\Tests\Array;

use Eophantasy\Types\Array\StringSequence;
use Eophantasy\Types\String\StringValue;
use PHPUnit\Framework\TestCase;

/**
 * A class for testing the StringSequence class.
 * 
 * @covers StringSequence
 */
class StringSequenceTest extends TestCase
{
    /**
     * Tests the construct method.
     * 
     * @return void
     * @covers StringSequence::__construct
     */
    public function testConstruct(): void
    {
        $this->assertInstanceOf(
            StringSequence::class,
            new StringSequence(
                new StringValue('a'),
                new StringValue('b'),
                new StringValue('c')
            )
        );
    }

    /**
     * Tests the count method.
     * 
     * @return void
     * @covers StringSequence::count
     */
    public function testCount(): void
    {
        $this->assertEquals(
            3,
            (new StringSequence(
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
     * @covers StringSequence::current
     */
    public function testCurrent(): void
    {
        $sequence = new StringSequence(
            new StringValue('a'),
            new StringValue('b'),
            new StringValue('c')
        );

        $this->assertEquals(new StringValue('a'), $sequence->current());

        $sequence->next();
        $this->assertEquals(new StringValue('b'), $sequence->current());

        $sequence->next();
        $this->assertEquals(new StringValue('c'), $sequence->current());
    }

    /**
     * Tests the key method.
     * 
     * @return void
     * @covers StringSequence::key
     */
    public function testKey(): void
    {
        $sequence = new StringSequence(
            new StringValue('a'),
            new StringValue('b'),
            new StringValue('c')
        );

        $this->assertEquals(0, $sequence->key());

        $sequence->next();
        $this->assertEquals(1, $sequence->key());

        $sequence->next();
        $this->assertEquals(2, $sequence->key());
    }

    /**
     * Tests the next method.
     * 
     * @return void
     * @covers StringSequence::next
     */
    public function testNext(): void
    {
        $sequence = new StringSequence(
            new StringValue('a'),
            new StringValue('b'),
            new StringValue('c')
        );

        $this->assertEquals(new StringValue('a'), $sequence->current());

        $sequence->next();
        $this->assertEquals(new StringValue('b'), $sequence->current());

        $sequence->next();
        $this->assertEquals(new StringValue('c'), $sequence->current());
    }

    /**
     * Tests the rewind method.
     * 
     * @return void
     * @covers StringSequence::rewind
     */
    public function testRewind(): void
    {
        $sequence = new StringSequence(
            new StringValue('a'),
            new StringValue('b'),
            new StringValue('c')
        );

        $this->assertEquals(new StringValue('a'), $sequence->current());

        $sequence->next();
        $this->assertEquals(new StringValue('b'), $sequence->current());

        $sequence->next();
        $this->assertEquals(new StringValue('c'), $sequence->current());
    }

    /**
     * Tests the valid method.
     * 
     * @return void
     * @covers StringSequence::valid
     */
    public function testValid(): void
    {
        $sequence = new StringSequence(
            new StringValue('a'),
            new StringValue('b'),
            new StringValue('c')
        );

        $this->assertTrue($sequence->valid());

        $sequence->next();
        $this->assertTrue($sequence->valid());

        $sequence->next();
        $this->assertTrue($sequence->valid());

        $sequence->next();
        $this->assertFalse($sequence->valid());
    }
}