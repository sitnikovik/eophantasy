<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Test\Time\Duration;

use Eophantasy\Time\Duration\Minutes;
use PHPUnit\Framework\TestCase;

/**
 * A class for testing the Minutes class.
 * 
 * @covers Eophantasy\Time\Duration\Minutes
 */
final class MinutesTest extends TestCase
{
    /**
     * Tests the add method.
     * 
     * @return void
     * @covers Eophantasy\Time\Duration\Minutes::add
     */
    public function testAdd(): void
    {
        $a = new Minutes(1);
        $b = $a->add(new Minutes(1));

        $this->assertNotEquals($a, $b);
        $this->assertNotSame($a, $b);
        $this->assertEquals(
            2,
            $b->minutes()
        );
    }


    /**
     * Tests the subtract method.
     * 
     * @return void
     * @covers Eophantasy\Time\Duration\Minutes::subtract
     */
    public function testSubtract(): void
    {
        $a = new Minutes(2);
        $b = $a->subtract(new Minutes(1));

        $this->assertNotEquals($a, $b);
        $this->assertNotSame($a, $b);
        $this->assertEquals(
            1,
            $b->minutes()
        );
    }

    /**
     * Tests the microseconds method.
     * 
     * @return void
     * @covers Eophantasy\Time\Duration\Minutes::microseconds
     */
    public function testMicroseconds(): void
    {
        $this->assertEquals(
            1e6 * 60,
            (new Minutes(1))->microseconds()
        );
    }

    /**
     * Tests the millisecondss method.
     * 
     * @return void
     * @covers Eophantasy\Time\Duration\Minutes::milliseconds
     */
    public function testMilliseconds(): void
    {
        $this->assertEquals(
            60 * 1e3,
            (new Minutes(1))->milliseconds()
        );
    }

    /**
     * Tests the minutes method.
     * 
     * @return void
     * @covers Eophantasy\Time\Duration\Minutes::minutes
     */
    public function testMinutes(): void
    {
        $this->assertEquals(
            25,
            (new Minutes(25))->minutes()
        );
    }

    /**
     * Tests the seconds method.
     * 
     * @return void
     * @covers Eophantasy\Time\Duration\Minutes::seconds
     */
    public function testSeconds(): void
    {
        $this->assertEquals(
            25 * 60,
            (new Minutes(25))->seconds()
        );
    }

    /**
     * Tests the hours method.
     * 
     * @return void
     * @covers Eophantasy\Time\Duration\Minutes::hours
     */
    public function testHours(): void
    {
        $this->assertEquals(
            1,
            (new Minutes(60))->hours()
        );
        $this->assertEquals(
            1,
            (new Minutes(119))->hours()
        );
    }
}
