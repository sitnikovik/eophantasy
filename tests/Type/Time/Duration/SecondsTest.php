<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Type\Time\Duration;

use PHPUnit\Framework\TestCase;

/**
 * A class for testing the Seconds class.
 * 
 * @covers Eophantasy\Type\Time\Duration\Seconds
 */
final class SecondsTest extends TestCase
{
    /**
     * Tests the construct method.
     * 
     * @return void
     * @covers Eophantasy\Type\Time\Duration\Seconds::__construct
     * @covers Eophantasy\Type\Time\Duration\Duration::__construct
     */
    public function testConstruct(): void
    {
        $this->assertInstanceOf(
            Seconds::class,
            new Seconds(1)
        );
    }

    /**
     * Tests the add method.
     * 
     * @return void
     * @covers Eophantasy\Type\Time\Duration\Duration::add
     */
    public function testAdd(): void
    {
        $a = new Seconds(1);
        $b = $a->add(new Seconds(1));

        $this->assertNotEquals($a, $b);
        $this->assertNotSame($a, $b);
        $this->assertEquals(
            2,
            $b->seconds()
        );
    }


    /**
     * Tests the subtract method.
     * 
     * @return void
     * @covers Eophantasy\Type\Time\Duration\Duration::subtract
     */
    public function testSubtract(): void
    {
        $a = new Seconds(2);
        $b = $a->subtract(new Seconds(1));

        $this->assertNotEquals($a, $b);
        $this->assertNotSame($a, $b);
        $this->assertEquals(
            1,
            $b->seconds()
        );
    }

    /**
     * Tests the microseconds method.
     * 
     * @return void
     * @covers Eophantasy\Type\Time\Duration\Duration::microseconds
     */
    public function testMicroseconds(): void
    {
        $this->assertEquals(
            15e6,
            (new Seconds(15))->microseconds()
        );
    }

    /**
     * Tests the milliseconds method.
     * 
     * @return void
     * @covers Eophantasy\Type\Time\Duration\Duration::milliseconds
     */
    public function testMilliseconds(): void
    {
        $this->assertEquals(
            2e3,
            (new Seconds(2))->milliseconds()
        );
    }

    /**
     * Tests the seconds method.
     * 
     * @return void
     * @covers Eophantasy\Type\Time\Duration\Duration::seconds
     */
    public function testSeconds(): void
    {
        $this->assertEquals(
            25,
            (new Seconds(25))->seconds()
        );
    }

    /**
     * Tests the minutes method.
     * 
     * @return void
     * @covers Eophantasy\Type\Time\Duration\Duration::minutes
     */
    public function testMinutes(): void
    {
        $this->assertEquals(
            1,
            (new Seconds(119))->minutes()
        );
    }

    /**
     * Tests the hours method.
     * 
     * @return void
     * @covers Eophantasy\Type\Time\Duration\Duration::hours
     */
    public function testHours(): void
    {
        $this->assertEquals(
            1,
            (new Seconds(3604))->hours()
        );

        $this->assertEquals(
            0,
            (new Seconds(3559))->hours()
        );

        $this->assertEquals(
            1,
            (new Seconds(7199))->hours()
        );
    }
}
