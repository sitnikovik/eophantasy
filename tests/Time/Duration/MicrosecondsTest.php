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

use Eophantasy\Time\Duration\Microseconds;
use PHPUnit\Framework\TestCase;

/**
 * A class for testing the Microseconds class.
 * 
 * @covers Eophantasy\Time\Duration\Microseconds
 */
final class MicrosecondsTest extends TestCase
{
    /**
     * Tests the add method.
     * 
     * @return void
     * @covers Eophantasy\Time\Duration\Microseconds::add
     */
    public function testAdd(): void
    {
        $a = new Microseconds(1);
        $b = $a->add(new Microseconds(1));

        $this->assertNotEquals($a, $b);
        $this->assertNotSame($a, $b);
        $this->assertEquals(
            2,
            $b->microseconds()
        );
    }

    /**
     * Tests the subtract method.
     * 
     * @return void
     * @covers Eophantasy\Time\Duration\Microseconds::subtract
     */
    public function testSubtract(): void
    {
        $this->assertEquals(
            1,
            (new Microseconds(2))
                ->subtract(new Microseconds(1))
                ->microseconds()
        );
    }

    /**
     * Tests the microseconds method.
     * 
     * @return void
     * @covers Eophantasy\Time\Duration\Microseconds::microseconds
     */
    public function testMicroseconds(): void
    {
        $this->assertEquals(
            1,
            (new Microseconds(1))
                ->microseconds()
        );
    }

    /**
     * Tests the seconds method.
     * 
     * @return void
     * @covers Eophantasy\Time\Duration\Microseconds::seconds
     */
    public function testSeconds(): void
    {
        $this->assertEquals(
            0,
            (new Microseconds(999999))
                ->seconds()
        );

        $this->assertEquals(
            1,
            (new Microseconds(1e6))
                ->seconds()
        );
    }

    /**
     * Tests the milliseconds method.
     * 
     * @return void
     * @covers Eophantasy\Time\Duration\Microseconds::milliseconds
     */
    public function testMilliseconds(): void
    {
        $this->assertEquals(
            0,
            (new Microseconds(999))
                ->milliseconds()
        );

        $this->assertEquals(
            1,
            (new Microseconds(1e3))
                ->milliseconds()
        );
    }

    /**
     * Tests the minutes method.
     * 
     * @return void
     * @covers Eophantasy\Time\Duration\Microseconds::minutes
     */
    public function testMinutes(): void
    {
        $this->assertEquals(
            0,
            (new Microseconds(59e6))
                ->minutes()
        );

        $this->assertEquals(
            1,
            (new Microseconds(60e6))
                ->minutes()
        );
    }

    /**
     * Tests the hours method.
     * 
     * @return void
     * @covers Eophantasy\Time\Duration\Microseconds::hours
     */
    public function testHours(): void
    {
        $this->assertEquals(
            0,
            (new Microseconds(3599e6))
                ->hours()
        );

        $this->assertEquals(
            1,
            (new Microseconds(3600e6))
                ->hours()
        );
    }
}
