<?php

namespace Eophantasy\Test\Time\Duration;

use Eophantasy\Type\Time\Duration\NowDuration;
use PHPUnit\Framework\TestCase;

/**
 * A class for testing the NowDuration class.
 */
class TestNowDuration extends TestCase
{
    /**
     * Tests the nanoseconds method.
     */
    public function testNanoseconds(): void
    {
        $this->assertEquals(
            microtime(true) * 1e9,
            (new NowDuration())->nanoseconds()
        );
    }
}