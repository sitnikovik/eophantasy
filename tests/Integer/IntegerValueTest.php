<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Types\Tests\Integer;

use Eophantasy\Types\Integer\IntegerValue;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;

/**
 * A class for testing the IntegerValue class.
 */
class IntegerValueTest extends TestCase
{
    /**
     * Tests the sum method.
     * 
     * @return void
     */
    public function testSum(): void
    {
        $a = new IntegerValue(5);
        $b = new IntegerValue(10);
        $c = $a->sum($b);

        $this->assertEquals(new IntegerValue(15), $c);
    }

    /**
     * Tests the subtract method.
     * 
     * @return void
     */
    public function testSubtract(): void
    {
        $a = new IntegerValue(5);
        $b = new IntegerValue(10);
        $c = $a->subtract($b);

        $this->assertEquals(new IntegerValue(-5), $c);
    }

    /**
     * Tests the multiply method.
     * 
     * @return void
     */
    public function testMultiply(): void
    {
        $a = new IntegerValue(5);
        $b = new IntegerValue(10);
        $c = $a->multiply($b);

        $this->assertEquals(new IntegerValue(50), $c);
    }

    /**
     * Tests the divide method.
     * 
     * @return void
     */
    public function testDivide(): void
    {
        $a = new IntegerValue(10);
        $b = new IntegerValue(5);
        $c = $a->divide($b);

        $this->assertEquals(new IntegerValue(2), $c);
    }

    /**
     * Tests the divide method with zero.
     * 
     * @return void
     */
    public function testDivideThrowsException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Cannot divide by zero.');

        $a = new IntegerValue(10);
        $b = new IntegerValue(0);
        $a->divide($b);
    }

    /**
     * Tests the empty method.
     * 
     * @return void
     */
    public function testEmpty(): void
    {
        $a = new IntegerValue(0);
        $b = new IntegerValue(5);

        $this->assertTrue($a->empty());
        $this->assertFalse($b->empty());
    }

    /**
     * Tests the equals method.
     * 
     * @return void
     */
    public function testEquals(): void
    {
        $a = new IntegerValue(5);
        $b = new IntegerValue(5);
        $c = new IntegerValue(10);

        $this->assertFalse($a->equals($c));

        $this->assertTrue($a->equals($b));
        $this->assertTrue($c->equals($c));
    }

    /**
     * Tests the greaterThan method.
     * 
     * @return void
     */
    public function testGreaterThan(): void
    {
        $a = new IntegerValue(5);
        $b = new IntegerValue(10);
        $c = new IntegerValue(5);

        $this->assertFalse($a->greaterThan($b));
        $this->assertFalse($a->greaterThan($c));

        $this->assertTrue($b->greaterThan($a));
    }

    /**
     * Tests the greaterThanOrEquals method.
     * 
     * @return void
     */
    public function testGreaterThanOrEquals(): void
    {
        $a = new IntegerValue(5);
        $b = new IntegerValue(10);
        $c = new IntegerValue(5);

        $this->assertFalse($a->greaterThanOrEquals($b));

        $this->assertTrue($a->greaterThanOrEquals($c));
        $this->assertTrue($b->greaterThanOrEquals($a));
    }

    /**
     * Tests the lessThan method.
     * 
     * @return void
     */
    public function testLessThan(): void
    {
        $a = new IntegerValue(5);
        $b = new IntegerValue(10);
        $c = new IntegerValue(5);

        $this->assertFalse($b->lessThan($a));
        $this->assertFalse($c->lessThan($a));

        $this->assertTrue($a->lessThan($b));
    }

    /**
     * Tests the lessThanOrEquals method.
     * 
     * @return void
     */
    public function testLessThanOrEquals(): void
    {
        $a = new IntegerValue(5);
        $b = new IntegerValue(10);
        $c = new IntegerValue(5);

        $this->assertFalse($b->lessThanOrEquals($a));

        $this->assertTrue($a->lessThanOrEquals($c));
        $this->assertTrue($a->lessThanOrEquals($b));
    }
}
