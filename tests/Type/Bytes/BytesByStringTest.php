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

use Eophantasy\Type\Bytes\BytesByString;
use PHPUnit\Framework\TestCase;

/**
 * A class for testing the BytesByString class.
 * 
 * @covers BytesByString
 */
class BytesByStringTest extends TestCase
{
    /**
     * Tests the construct method.
     * 
     * @return void
     * @covers BytesByString::__construct
     */
    public function testConstruct(): void
    {
        $this->assertInstanceOf(
            BytesByString::class,
            new BytesByString('Hello, world!')
        );
    }

    /**
     * Tests the count method.
     * 
     * @return void
     * @covers BytesByString::count
     */
    public function testCount(): void
    {
        $this->assertEquals(
            13,
            (new BytesByString('Hello, world!'))->count()
        );
    }

    /**
     * Tests the toString method.
     * 
     * @return void
     * @covers BytesByString::toString
     */
    public function testToString(): void
    {
        $this->assertEquals(
            'Hello, world!',
            (new BytesByString('Hello, world!'))->toString()
        );
    }

    /**
     * Tests the equals method.
     * 
     * @return void
     * @covers BytesByString::equals
     */
    public function testEquals(): void
    {
        $a = new BytesByString('Hello, world!');
        $b = new BytesByString('Hello, world!');
        $c = new BytesByString('Hello, world');

        $this->assertTrue($a->equals($b));
        $this->assertFalse($b->equals($c));
        $this->assertFalse($c->equals($a));
    }
}