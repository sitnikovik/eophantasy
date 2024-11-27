<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Types\Tests\String;

use Eophantasy\Types\String\StringValue;
use PHPUnit\Framework\TestCase;

/**
 * A class for testing the StringValue class.
 */
class StringValueTest extends TestCase
{
    /**
     * Tests the concat method.
     * 
     * @return void
     * @covers StringValue::concat
     */
    public function testConcat(): void
    {
        $a = new StringValue('Hello, ');
        $b = new StringValue('world!');
        $c = $a->concat($b);

        $this->assertEquals(new StringValue('Hello, world!'), $c);
    }
}