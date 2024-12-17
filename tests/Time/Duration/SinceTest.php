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

use Eophantasy\Time\Duration\Now;
use Eophantasy\Time\Duration\Since;
use PHPUnit\Framework\TestCase;

/**
 * A class for testing the Since class.
 * 
 * @covers Eophantasy\Time\Duration\Since
 */
final class SinceTest extends TestCase
{
    /**
     * Tests the microsecondss method.
     * 
     * @return void
     * @covers Eophantasy\Time\Duration\Since::microseconds
     */
    public function testMicroseconds(): void 
    {
        $this->assertEquals(
            0,
            (new Since(new Now()))
                ->microseconds()
        );
    }
}
