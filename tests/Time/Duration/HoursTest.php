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

use Eophantasy\Time\Duration\Hours;
use PHPUnit\Framework\TestCase;

/**
 * A class for testing the Hours class.
 * 
 * @covers Eophantasy\Time\Duration\Hours
 */
final class HoursTest extends TestCase
{
    /**
     * Tests the add method.
     * 
     * @return void
     * @covers Eophantasy\Time\Duration\Hours::add
     */
    public function testAdd(): void
    {
        $this->assertEquals(
            3,
            (new Hours(1))
                ->add(new Hours(2))
                ->hours()
        );
    }

    /**
     * Tests the subtract method.
     * 
     * @return void
     * @covers Eophantasy\Time\Duration\Hours::subtract
     */
    public function testSubtract(): void
    {
        $this->assertEquals(
            1,
            (new Hours(2))
                ->subtract(new Hours(1))
                ->hours()
        );
    }

    /**
     * Tests the microseconds method.
     * 
     * @return void
     * @covers Eophantasy\Time\Duration\Hours::microseconds
     */
    public function testToMicroseconds(): void
    {
        $this->assertEquals(
            1e6 * 60 * 60,
            (new Hours(1))->microseconds()
        );
    }

    /**
     * Tests the hours method.
     * 
     * @return void
     * @covers Eophantasy\Time\Duration\Hours::hours
     */
    public function testHours(): void
    {
        $this->assertEquals(
            1,
            (new Hours(1))->hours()
        );
    }

    /**
     * Tests the minutes method.
     * 
     * @return void
     * @covers Eophantasy\Time\Duration\Hours::minutes
     */
    public function testMinutes(): void
    {
        $this->assertEquals(
            60,
            (new Hours(1))->minutes()
        );
    }

    /**
     * Tests the seconds method.
     * 
     * @return void
     * @covers Eophantasy\Time\Duration\Hours::seconds
     */
    public function testSeconds(): void
    {
        $this->assertEquals(
            60 * 60,
            (new Hours(1))->seconds()
        );
    }

    /**
     * Tests the milliseconds method.
     * 
     * @return void
     * @covers Eophantasy\Time\Duration\Hours::milliseconds
     */
    public function testMilliseconds(): void
    {
        $this->assertEquals(
            60 * 60 * 1e3,
            (new Hours(1))->milliseconds()
        );
    }

        /**
     * Tests the microseconds method.
     * 
     * @return void
     * @covers Eophantasy\Time\Duration\Hours::microseconds
     */
    public function testMicroseconds(): void
    {
        $this->assertEquals(
            60 * 60 * 1e6,
            (new Hours(1))->microseconds()
        );
    }


}
