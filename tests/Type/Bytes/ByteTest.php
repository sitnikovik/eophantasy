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

use Eophantasy\Type\Bytes\Byte;
use PHPUnit\Framework\TestCase;

/**
 * A class for testing the Byte class.
 * 
 * @covers Byte
 */
class ByteTest extends TestCase
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
            Byte::class,
            new Byte(1)
        );
    }

    /**
     * Tests the value method.
     * 
     * @return void
     * @covers Byte::value
     */
    public function testValue(): void
    {
        $this->assertEquals(
            1,
            (new Byte(1))->value()
        );
    }
 
}