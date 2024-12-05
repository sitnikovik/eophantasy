<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Test\Type\Bytes;

use Eophantasy\Type\Bytes\Bytes;
use PHPUnit\Framework\TestCase;

/**
 * A class for testing the Bytes class.
 * 
 * @covers Bytes
 */
class BytesTest extends TestCase
{
    /**
     * Tests the construct method.
     * 
     * @return void
     * @covers Byte::__construct
     */
    public function testConstruct(): void
    {
        $this->assertInstanceOf(
            Bytes::class,
            new Bytes(1, 2, 3)
        );
    }

    /**
     * Tests the count method.
     * 
     * @return void
     * @covers Bytes::count
     */
    public function testCount(): void
    {
        $this->assertEquals(
            3,
            (new Bytes(1, 2, 3))->count()
        );
    }

    /**
     * Tests the toString method.
     * 
     * @return void
     * @covers Bytes::toString
     */
    public function testToString(): void
    {
        $this->assertEquals(
            'Hello, world!',
            (new Bytes(
                ...array_map(
                    'ord',
                    str_split('Hello, world!')
                )
            ))->toString()
        );
    }

    /**
     * Tests the equals method.
     * 
     * @return void
     * @covers Bytes::equals
     */
    public function testEquals(): void
    {
        $a = new Bytes(1, 2, 3);
        $b = new Bytes(1, 2, 3);
        $c = new Bytes(1, 2, 4);


        $this->assertTrue($a->equals($b));
        $this->assertFalse($c->equals($b));
        $this->assertFalse($c->equals($a));
    }

    /**
     * Tests the current method.
     * 
     * @return void
     * @covers Bytes::current
     */
    public function testCurrent(): void
    {
        $bytes = new Bytes(1, 2, 3);
        $bytes->rewind();

        $this->assertEquals(1, $bytes->current());
    }

    /**
     * Tests the key method.
     * 
     * @return void
     * @covers Bytes::key
     */
    public function testKey(): void
    {
        $bytes = new Bytes(1, 2, 3);
        $bytes->rewind();

        $this->assertEquals(0, $bytes->key());
    }

    /**
     * Tests the next method.
     * 
     * @return void
     * @covers Bytes::next
     */
    public function testNext(): void
    {
        $bytes = new Bytes(1, 2, 3);
        $bytes->rewind();

        $bytes->next();
        $this->assertEquals(2, $bytes->current());

        $bytes->next();
        $this->assertEquals(3, $bytes->current());
    }

    /**
     * Tests the rewind method.
     * 
     * @return void
     * @covers Bytes::rewind
     */
    public function testRewind(): void
    {
        $bytes = new Bytes(1, 2, 3);
        $bytes->rewind();

        $this->assertEquals(1, $bytes->current());

        $bytes->next();
        $this->assertEquals(2, $bytes->current());

        $bytes->rewind();
        $this->assertEquals(1, $bytes->current());
    }

    /**
     * Tests the valid method.
     * 
     * @return void
     * @covers Bytes::valid
     */
    public function testValid(): void
    {
        $bytes = new Bytes(1, 2, 3);
        $bytes->rewind();

        $this->assertTrue($bytes->valid());

        $bytes->next();
        $this->assertTrue($bytes->valid());

        $bytes->next();
        $this->assertTrue($bytes->valid());

        $bytes->next();
        $this->assertFalse($bytes->valid());
    }
}
