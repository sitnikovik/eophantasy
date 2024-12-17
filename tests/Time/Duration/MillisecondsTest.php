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

use Eophantasy\Time\Duration\Milliseconds;
use PHPUnit\Framework\TestCase;

/**
 * A class for testing the Milliseconds class.
 * 
 * @covers Eophantasy\Time\Duration\Milliseconds
 */
final class MillisecondsTest extends TestCase
{
    /**
     * Tests the add method.
     * 
     * @return void
     * @covers Eophantasy\Time\Duration\Milliseconds::add
     */
    public function testAdd(): void
    {
        $a = new Milliseconds(1);
        $b = $a->add(new Milliseconds(1));

        $this->assertNotEquals($a, $b);
        $this->assertNotSame($a, $b);
        $this->assertEquals(
            2,
            $b->milliseconds()
        );
    }

    /**
     * Tests the subtract method.
     * 
     * @return void
     * @covers Eophantasy\Time\Duration\Milliseconds::subtract
     */
    public function testSubtract(): void
    {
        $a = new Milliseconds(1);
        $b = $a->subtract(new Milliseconds(1));

        $this->assertNotEquals($a, $b);
        $this->assertNotSame($a, $b);
        $this->assertEquals(
            0,
            $b->milliseconds()
        );
    }

    /**
     * Tests the milliseconds method.
     * 
     * @return void
     * @covers Eophantasy\Time\Duration\Milliseconds::milliseconds
     */
    public function testMilliseconds(): void
    {
        $this->assertEquals(
            1,
            (new Milliseconds(1))
                ->milliseconds()
        );
    }

    /**
     * Tests the microseconds method.
     * 
     * @return void
     * @covers Eophantasy\Time\Duration\Milliseconds::microseconds
     */
    public function testMicroseconds(): void
    {
        $this->assertEquals(
            1000,
            (new Milliseconds(1))
                ->microseconds()
        );
    }

    /**
     * Tests the seconds method.
     * 
     * @return void
     * @covers Eophantasy\Time\Duration\Milliseconds::seconds
     */
    public function testSeconds(): void
    {
        $this->assertEquals(
            0,
            (new Milliseconds(999))
                ->seconds()
        );
    }

    /**
     * Tests the minutes method.
     * 
     * @return void
     * @covers Eophantasy\Time\Duration\Milliseconds::minutes
     */
    public function testMinutes(): void
    {
        $this->assertEquals(
            0,
            (new Milliseconds(999 * 60))
                ->minutes()
        );
    }

    /**
     * Tests the hours method.
     * 
     * @return void
     * @covers Eophantasy\Time\Duration\Milliseconds::hours
     */
    public function testHours(): void
    {
        $this->assertEquals(
            0,
            (new Milliseconds(999 * 3600))
                ->hours()
        );
    }
}

