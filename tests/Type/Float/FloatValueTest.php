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

use DivisionByZeroError;
use Eophantasy\Type\Float\FloatValue;

use PHPUnit\Framework\TestCase;

/**
 * A class for testing the FloatValue class.
 * 
 * @covers FloatValue
 */
class FloatValueTest extends TestCase
{
    /**
     * Tests the sum method.
     * 
     * @return void
     * @covers FloatValue::sum
     */
    public function testSum(): void
    {
        $a = new FloatValue(5.5);
        $b = new FloatValue(10.5);
        $c = $a->sum($b);

        $this->assertNotSame($c, $a);
        $this->assertEquals(
            new FloatValue(16.0),
            $c
        );
    }

    /**
     * Tests the value method.
     * 
     * @return void
     * @covers FloatValue::value
     */
    public function testValue(): void
    {
        $a = new FloatValue(5.5);
        $this->assertEquals(5.5, $a->value());
    }

    /**
     * Tests the subtract method.
     * 
     * @return void
     * @covers FloatValue::subtract
     */
    public function testSubtract(): void
    {
        $a = new FloatValue(5.5);
        $b = new FloatValue(10.5);
        $c = $a->subtract($b);

        $this->assertNotSame($c, $a);
        $this->assertEquals(
            new FloatValue(-5.0),
            $c
        );
    }

    /**
     * Tests the multiply method.
     * 
     * @return void
     * @covers FloatValue::multiply
     */
    public function testMultiply(): void
    {
        $a = new FloatValue(5.5);
        $b = new FloatValue(10.5);
        $c = $a->multiply($b);

        $this->assertNotSame($c, $a);
        $this->assertEquals(
            new FloatValue(57.75),
            $c
        );
    }

    /**
     * Tests the divide method.
     * 
     * @return void
     * @covers FloatValue::divide
     */
    public function testDivide(): void
    {
        $a = new FloatValue(5.5);
        $b = new FloatValue(10.5);
        $c = $a->divide($b);

        $this->assertNotSame($c, $a);
        $this->assertEquals(
            new FloatValue(0.5238095238095238),
            $c
        );
    }

    /**
     * Tests the divide method with zero.
     * 
     * @return void
     * @covers FloatValue::divide
     */
    public function testDivideWithZero(): void
    {
        $this->expectException(DivisionByZeroError::class);

        $a = new FloatValue(5.5);
        $b = new FloatValue(0);
        $c = $a->divide($b);

        $this->assertNotSame($c, $a);
    }

      /**
     * Tests the empty method.
     * 
     * @return void
     * @covers FloatValue::empty
     */
    public function testEmpty(): void
    {
        $a = new FloatValue(0);
        $b = new FloatValue(5.5);

        $this->assertTrue($a->empty());
        $this->assertFalse($b->empty());
    }

    /**
     * Tests the equals method.
     * 
     * @return void
     * @covers FloatValue::equals
     */
    public function testEquals(): void
    {
        $a = new FloatValue(5);
        $b = new FloatValue(5);
        $c = new FloatValue(10);

        $this->assertFalse($a->equals($c));

        $this->assertTrue($a->equals($b));
        $this->assertTrue($c->equals($c));
    }

    /**
     * Tests the greaterThan method.
     * 
     * @return void
     * @covers FloatValue::greaterThan
     */
    public function testGreaterThan(): void
    {
        $a = new FloatValue(5);
        $b = new FloatValue(10);
        $c = new FloatValue(5);

        $this->assertFalse($a->greaterThan($b));
        $this->assertFalse($a->greaterThan($c));

        $this->assertTrue($b->greaterThan($a));
    }

    /**
     * Tests the greaterThanOrEquals method.
     * 
     * @return void
     * @covers FloatValue::greaterThanOrEquals
     */
    public function testGreaterThanOrEquals(): void
    {
        $a = new FloatValue(5);
        $b = new FloatValue(10);
        $c = new FloatValue(5);

        $this->assertFalse($a->greaterThanOrEquals($b));

        $this->assertTrue($a->greaterThanOrEquals($c));
        $this->assertTrue($b->greaterThanOrEquals($a));
    }

    /**
     * Tests the lessThan method.
     * 
     * @return void
     * @covers FloatValue::lessThan
     */
    public function testLessThan(): void
    {
        $a = new FloatValue(5);
        $b = new FloatValue(10);
        $c = new FloatValue(5);

        $this->assertFalse($b->lessThan($a));
        $this->assertFalse($c->lessThan($a));

        $this->assertTrue($a->lessThan($b));
    }

    /**
     * Tests the lessThanOrEquals method.
     * 
     * @return void
     * @covers FloatValue::lessThanOrEquals
     */
    public function testLessThanOrEquals(): void
    {
        $a = new FloatValue(5);
        $b = new FloatValue(10);
        $c = new FloatValue(5);

        $this->assertFalse($b->lessThanOrEquals($a));

        $this->assertTrue($a->lessThanOrEquals($c));
        $this->assertTrue($a->lessThanOrEquals($b));
    }
}
