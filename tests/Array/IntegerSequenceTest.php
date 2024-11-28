<?php

namespace Eophantasy\Types\Tests\Array;

use Eophantasy\Types\Array\IntegerSequence;
use Eophantasy\Types\Integer\IntegerValue;
use PHPUnit\Framework\TestCase;

/**
 * A class for testing the IntegerSequence class.
 * 
 * @covers IntegerSequence
 */
class IntegerSequenceTest extends TestCase
{
    /**
     * Tests the construct method.
     * 
     * @return void
     * @covers IntegerSequence::__construct
     */
    public function testConstruct(): void
    {
        $this->assertInstanceOf(
            IntegerSequence::class,
            new IntegerSequence(
                new IntegerValue(1),
                new IntegerValue(2),
                new IntegerValue(3)
            )
        );
    }

    /**
     * Tests the count method.
     * 
     * @return void
     * @covers IntegerSequence::count
     */
    public function testCount(): void
    {
        $this->assertEquals(
            3,
            (new IntegerSequence(
                new IntegerValue(1),
                new IntegerValue(2),
                new IntegerValue(3)
            ))->count()
        );
    }

    /**
     * Tests the current method.
     * 
     * @return void
     * @covers IntegerSequence::current
     */
    public function testCurrent(): void
    {
        $sequence = new IntegerSequence(
            new IntegerValue(1),
            new IntegerValue(2),
            new IntegerValue(3)
        );
        $this->assertEquals(
            new IntegerValue(1),
            $sequence->current()
        );

        $sequence->next();
        $this->assertEquals(
            new IntegerValue(2),
            $sequence->current()
        );

        $sequence->next();
        $this->assertEquals(
            new IntegerValue(3),
            $sequence->current()
        );
    }

    /**
     * Tests the key method.
     * 
     * @return void
     * @covers IntegerSequence::key
     */
    public function testKey(): void
    {
        $sequence = new IntegerSequence(
            new IntegerValue(1),
            new IntegerValue(2),
            new IntegerValue(3)
        );
        $this->assertEquals(
            0,
            $sequence->key()
        );

        $sequence->next();
        $this->assertEquals(
            1,
            $sequence->key()
        );

        $sequence->next();
        $this->assertEquals(
            2,
            $sequence->key()
        );
    }

    /**
     * Tests the next method.
     * 
     * @return void
     * @covers IntegerSequence::next
     */
    public function testNext(): void
    {
        $sequence = new IntegerSequence(
            new IntegerValue(1),
            new IntegerValue(2),
            new IntegerValue(3)
        );

        $sequence->next();
        $this->assertEquals(
            new IntegerValue(2),
            $sequence->current()
        );

        $sequence->next();
        $this->assertEquals(
            new IntegerValue(3),
            $sequence->current()
        );
    }

    /**
     * Tests the rewind method.
     * 
     * @return void
     * @covers IntegerSequence::rewind
     */
    public function testRewind(): void
    {
        $sequence = new IntegerSequence(
            new IntegerValue(1),
            new IntegerValue(2),
            new IntegerValue(3)
        );

        $sequence->next();
        $this->assertEquals(
            new IntegerValue(2),
            $sequence->current()
        );

        $sequence->rewind();
        $this->assertEquals(
            new IntegerValue(1),
            $sequence->current()
        );
    }

    /**
     * Tests the valid method.
     * 
     * @return void
     * @covers IntegerSequence::valid
     */
    public function testValid(): void
    {
        $sequence = new IntegerSequence(
            new IntegerValue(1),
            new IntegerValue(2),
            new IntegerValue(3)
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
