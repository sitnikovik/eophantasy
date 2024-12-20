<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Test\Http\Request;

use Eophantasy\Http\Request\Method\Get;
use Eophantasy\Http\Request\RequestBasic;
use Eophantasy\Http\Request\RequestWithTimeout;
use Eophantasy\Http\Request\Url\Host\Host;
use Eophantasy\Http\Request\Url\Path\Path;
use Eophantasy\Http\Request\Url\Protocol\Https;
use Eophantasy\Http\Request\Url\UrlWithPath;
use Eophantasy\Http\Request\Url\UrlWrap;
use Eophantasy\Time\Duration\Seconds;
use PHPUnit\Framework\TestCase;

final class RequestWithTimeoutTest extends TestCase
{
    public function testResponse()
    {
        $response =  (new RequestWithTimeout(
            new RequestBasic(
                new Get(),
                new UrlWithPath(
                    new UrlWrap(
                        new Https(),
                        new Host('httpbin.org')
                    ),
                    new Path('/delay/3')
                )
            ),
            new Seconds(1)
        ))->response();

        $this->assertEquals(
            504,
            $response
                ->statusCode()
                ->toInt(),
        );

        $this->assertTrue(
            $response
                ->statusCode()
                ->serverError(),
        );
    }
}
