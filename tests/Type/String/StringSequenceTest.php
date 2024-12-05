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

use Eophantasy\Type\String\StringSequence;
use Eophantasy\Type\String\StringValue;
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
     * Tests the add method.
     * 
     * @return void
     * @covers StringSequence::add
     */
    public function testAdd(): void
    {
        $a = new StringSequence(
            new StringValue('a'),
            new StringValue('b'),
            new StringValue('c')
        );
        $b = $a->add(new StringValue('d'));

        $this->assertNotEquals($a, $b);
        $this->assertNotSame($a, $b);
        $this->assertEquals(
            new StringSequence(
                new StringValue('a'),
                new StringValue('b'),
                new StringValue('c'),
                new StringValue('d')
            ),
            $b
        );
    }

    /**
     * Tests the remove method.
     * 
     * @return void
     * @covers StringSequence::remove
     */
    public function testRemove(): void
    {
        $a = new StringSequence(
            new StringValue('a'),
            new StringValue('b'),
            new StringValue('c')
        );
        $b = $a->remove(new StringValue('b'));
        $c = $b->remove(new StringValue('c'));

        $this->assertNotEquals($a, $b);
        $this->assertNotSame($a, $b);
        $this->assertNotSame($b, $c);
        $this->assertNotSame($a, $c);

        $this->assertEquals(
            new StringSequence(
                new StringValue('a'),
            ),
            $c
        );
    }

    /**
     * Tests the has method.
     * 
     * @return void
     * @covers StringSequence::has
     */
    public function testHas(): void
    {
        $sequence = new StringSequence(
            new StringValue('a'),
            new StringValue('b'),
            new StringValue('c')
        );

        $this->assertTrue($sequence->has(new StringValue('a')));
        $this->assertTrue($sequence->has(new StringValue('b')));
        $this->assertTrue($sequence->has(new StringValue('c')));
        $this->assertFalse($sequence->has(new StringValue('d')));
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