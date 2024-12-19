<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Test\Http\Response\Status;

use Eophantasy\Http\Response\Status\Code;
use PHPUnit\Framework\TestCase;

/**
 * Tests the Code class.
 * 
 * @covers \Eophantasy\Http\Response\Status\Code
 */
final class CodeTest extends TestCase
{
    
    /**
     * Tests the toInt method.
     * 
     * @return void
     * @covers \Eophantasy\Http\Response\Code::toInt
     */
    public function testToInt(): void
    {
        $this->assertEquals(
            200,
            (new Code(200))->toInt()
        );
    }

    /**
     * Tests the __toString method.
     * 
     * @return void
     * @covers \Eophantasy\Http\Response\Code::__toString
     */
    public function testToString(): void
    {
        $this->assertEquals(
            '200',
            (string) new Code(200)
        );
    }

    /**
     * Tests the success method.
     * 
     * @return void
     * @covers \Eophantasy\Http\Response\Code::success
     */
    public function testSuccess(): void
    {
        $this->assertTrue(
            (new Code(200))->success()
        );
        $this->assertTrue(
            (new Code(201))->success()
        );
        $this->assertTrue(
            (new Code(299))->success()
        );

        $this->assertFalse(
            (new Code(1))->success()
        );
        $this->assertFalse(
            (new Code(30))->success()
        );
    }

    /**
     * Tests the redirection method.
     * 
     * @return void
     * @covers \Eophantasy\Http\Response\Code::redirect
     */
    public function testRedirect(): void
    {
        $this->assertTrue(
            (new Code(300))->redirect()
        );
        $this->assertTrue(
            (new Code(301))->redirect()
        );
        $this->assertTrue(
            (new Code(399))->redirect()
        );

        $this->assertFalse(
            (new Code(1))->redirect()
        );
        $this->assertFalse(
            (new Code(30))->redirect()
        );
    }

    /**
     * Tests the info method.
     * 
     * @return void
     * @covers \Eophantasy\Http\Response\Code::info
     */
    public function testInfo(): void
    {
        $this->assertTrue(
            (new Code(100))->info()
        );
        $this->assertTrue(
            (new Code(101))->info()
        );
        $this->assertTrue(
            (new Code(199))->info()
        );

        $this->assertFalse(
            (new Code(1))->info()
        );
        $this->assertFalse(
            (new Code(200))->info()
        );
    }

    /**
     * Tests the clientError method.
     * 
     * @return void
     * @covers \Eophantasy\Http\Response\Code::clientError
     */
    public function testClientError(): void
    {
        $this->assertTrue(
            (new Code(400))->clientError()
        );
        $this->assertTrue(
            (new Code(401))->clientError()
        );
        $this->assertTrue(
            (new Code(499))->clientError()
        );

        $this->assertFalse(
            (new Code(1))->clientError()
        );
        $this->assertFalse(
            (new Code(300))->clientError()
        );
    }

    /**
     * Tests the serverError method.
     * 
     * @return void
     * @covers \Eophantasy\Http\Response\Code::serverError
     */
    public function testServerError(): void
    {
        $this->assertTrue(
            (new Code(500))->serverError()
        );
        $this->assertTrue(
            (new Code(501))->serverError()
        );
        $this->assertTrue(
            (new Code(599))->serverError()
        );

        $this->assertFalse(
            (new Code(1))->serverError()
        );
        $this->assertFalse(
            (new Code(400))->serverError()
        );
    }
}