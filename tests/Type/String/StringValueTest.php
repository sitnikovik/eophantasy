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

use Eophantasy\Type\String\StringValue;
use PHPUnit\Framework\TestCase;

/**
 * A class for testing the StringValue class.
 * 
 * @covers StringValue
 */
class StringValueTest extends TestCase
{
    /**
     * Tests the concat method.
     * 
     * @return void
     * @covers StringValue::concat
     */
    public function testConcat(): void
    {
        $a = new StringValue('Hello, ');
        $b = new StringValue('world!');
        $c = $a->concat($b);

        $this->assertNotSame($c, $a);
        $this->assertEquals(new StringValue('Hello, world!'), $c);
    }

    /**
     * Tests the value method.
     * 
     * @return void
     * @covers StringValue::value
     */
    public function testValue(): void
    {
        $a = new StringValue('Hello, world!');
        $this->assertEquals('Hello, world!', $a->value());
    }

    /**
     * Tests the empty method.
     * 
     * @return void
     * @covers StringValue::empty
     */
    public function testEmpty(): void
    {
        $this->assertTrue((new StringValue(''))->empty());
        $this->assertFalse((new StringValue('Hello'))->empty());
    }

    /**
     * Tests the equals method.
     * 
     * @return void
     * @covers StringValue::equals
     */
    public function testEquals(): void
    {
        $a = new StringValue('Hello');
        $b = new StringValue('Hello');
        $c = new StringValue('World');

        $this->assertTrue($a->equals($b));
        $this->assertFalse($a->equals($c));
    }
}