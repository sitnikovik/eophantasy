<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Types\Tests\Float;

use Eophantasy\Types\Float\FloatValue;

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

        $this->assertEquals(
            new FloatValue(16.0),
            $c
        );
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

        $this->assertEquals(
            new FloatValue(0.5238095238095238),
            $c
        );
    }
}
