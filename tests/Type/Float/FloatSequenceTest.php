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

use Eophantasy\Type\Float\FloatSequence;
use Eophantasy\Type\Float\FloatValue;
use PHPUnit\Framework\TestCase;

/**
 * A class for testing the FloatSequence class.
 * 
 * @covers FloatSequence
 */
class FloatSequenceTest extends TestCase
{
    /**
     * Tests the construct method.
     * 
     * @return void
     * @covers FloatSequence::__construct
     */
    public function testConstruct(): void
    {
        $this->assertInstanceOf(
            FloatSequence::class,
            new FloatSequence(
                new FloatValue(1.1),
                new FloatValue(2.2),
                new FloatValue(3.3)
            )
        );
    }

    /**
     * Tests the add method.
     * 
     * @return void
     * @covers FloatSequence::add
     */
    public function testAdd(): void
    {
        $a = new FloatSequence(
            new FloatValue(1.1),
            new FloatValue(2.2),
            new FloatValue(3.3)
        );
        $b = $a->add(new FloatValue(4.4));

        $this->assertNotEquals($a, $b);
        $this->assertNotSame($a, $b);
        $this->assertEquals(
            new FloatSequence(
                new FloatValue(1.1),
                new FloatValue(2.2),
                new FloatValue(3.3)
            ),
            $a
        );
        $this->assertEquals(
            new FloatSequence(
                new FloatValue(1.1),
                new FloatValue(2.2),
                new FloatValue(3.3),
                new FloatValue(4.4)
            ),
            $b
        );
    }

    /**
     * Tests the remove method.
     * 
     * @return void
     * @covers FloatSequence::remove
     */
    public function testRemove(): void
    {
        $a = new FloatSequence(
            new FloatValue(1.1),
            new FloatValue(2.2),
            new FloatValue(3.3)
        );
        $b = $a->remove(new FloatValue(2.2));

        $this->assertNotEquals($a, $b);
        $this->assertNotSame($a, $b);
        $this->assertEquals(
            new FloatSequence(
                new FloatValue(1.1),
                new FloatValue(2.2),
                new FloatValue(3.3)
            ),
            $a
        );
        $this->assertEquals(
            new FloatSequence(
                new FloatValue(1.1),
                new FloatValue(3.3)
            ),
            $b
        );
    }

    /**
     * Tests the has method.
     * 
     * @return void
     * @covers FloatSequence::has
     */
    public function testHas(): void
    {
        $sequence = new FloatSequence(
            new FloatValue(1.1),
            new FloatValue(2.2),
            new FloatValue(3.3)
        );

        $this->assertTrue($sequence->has(new FloatValue(1.1)));
        $this->assertTrue($sequence->has(new FloatValue(2.2)));
        $this->assertTrue($sequence->has(new FloatValue(3.3)));
        $this->assertFalse($sequence->has(new FloatValue(4.4)));
    }

    /**
     * Tests the count method.
     * 
     * @return void
     * @covers FloatSequence::count
     */
    public function testCount(): void
    {
        $this->assertEquals(
            3,
            (new FloatSequence(
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
     * @covers FloatSequence::current
     */
    public function testCurrent(): void
    {
        $sequence = new FloatSequence(
            new FloatValue(1.1),
            new FloatValue(2.2),
            new FloatValue(3.3)
        );
        $this->assertEquals(
            new FloatValue(1.1),
            $sequence->current()
        );

        $sequence->next();
        $this->assertEquals(
            new FloatValue(2.2),
            $sequence->current()
        );

        $sequence->next();
        $this->assertEquals(
            new FloatValue(3.3),
            $sequence->current()
        );
    }

    /**
     * Tests the key method.
     * 
     * @return void
     * @covers FloatSequence::key
     */
    public function testKey(): void
    {
        $sequence = new FloatSequence(
            new FloatValue(1.1),
            new FloatValue(2.2),
            new FloatValue(3.3)
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
     * @covers FloatSequence::next
     */
    public function testNext(): void
    {
        $sequence = new FloatSequence(
            new FloatValue(1.1),
            new FloatValue(2.2),
            new FloatValue(3.3)
        );
        $this->assertEquals(
            new FloatValue(1.1),
            $sequence->current()
        );

        $sequence->next();
        $this->assertEquals(
            new FloatValue(2.2),
            $sequence->current()
        );

        $sequence->next();
        $this->assertEquals(
            new FloatValue(3.3),
            $sequence->current()
        );
    }

    /**
     * Tests the rewind method.
     * 
     * @return void
     * @covers FloatSequence::rewind
     */
    public function testRewind(): void
    {
        $sequence = new FloatSequence(
            new FloatValue(1.1),
            new FloatValue(2.2),
            new FloatValue(3.3)
        );
        $sequence->next();
        $sequence->next();
        $this->assertEquals(
            new FloatValue(3.3),
            $sequence->current()
        );

        $sequence->rewind();
        $this->assertEquals(
            new FloatValue(1.1),
            $sequence->current()
        );
    }

    /**
     * Tests the valid method.
     * 
     * @return void
     * @covers FloatSequence::valid
     */
    public function testValid(): void
    {
        $sequence = new FloatSequence(
            new FloatValue(1.1),
            new FloatValue(2.2),
            new FloatValue(3.3)
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