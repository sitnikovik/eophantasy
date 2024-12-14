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
use Eophantasy\Http\Request\Url\Query\Query;
use Eophantasy\Http\Request\Url\Path\Path;
use Eophantasy\Http\Request\Url\Host\Host;
use Eophantasy\Http\Request\Url\Protocol\Https;
use Eophantasy\Http\Request\Url\UrlWithPath;
use Eophantasy\Http\Request\Url\UrlWithQueries;
use Eophantasy\Http\Request\Url\UrlWrap;
use PHPUnit\Framework\TestCase;

/**
 * A class for testing the RequestBasic class.
 * 
 * @covers RequestBasic
 */
final class RequestBasicTest extends TestCase
{
    /**
     * Tests the request method.
     * 
     * @return void
     * @covers RequestBasic::response
     * @covers RequestBasic::__construct
     * @covers ResponseBasic::read
     * @covers ResponseBasic::__construct
     */
    public function testResponse()
    {
        $response = (new RequestBasic(
            new Get(),
            new UrlWithQueries(
                new UrlWithPath(
                    new UrlWrap(
                        new Https(),
                        new Host('httpbin.org')
                    ),
                    new Path('/get')
                ),
                new Query('foo', 'bar'),
                new Query('limit', 10),
                new Query('ok', true)
            ),

        ))->response();

        $jsonDecoded = json_decode(
            $response->read()->toString(),
            true
        );

        $this->assertEquals(
            'bar',
            $jsonDecoded['args']['foo']
        );
        $this->assertEquals(
            '10',
            $jsonDecoded['args']['limit']
        );
        $this->assertEquals(
            '1',
            $jsonDecoded['args']['ok']
        );
        $this->assertEquals(
            'https://httpbin.org/get?foo=bar&limit=10&ok=1',
            $jsonDecoded['url']
        );
        $this->assertEquals(
            'httpbin.org',
            $jsonDecoded['headers']['Host']
        );
    }
}
