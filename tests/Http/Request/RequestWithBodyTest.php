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

use Eophantasy\Http\Request\Body\JsonBody;
use Eophantasy\Http\Request\Header\Header;
use Eophantasy\Http\Request\Method\Post;
use Eophantasy\Http\Request\RequestBasic;
use Eophantasy\Http\Request\RequestWithBody;
use Eophantasy\Http\Request\RequestWithHeaders;
use Eophantasy\Http\Request\Url\Query\Query;
use Eophantasy\Http\Request\Url\Path\Path;
use Eophantasy\Http\Request\Url\Host\Host;
use Eophantasy\Http\Request\Url\Protocol\Https;
use Eophantasy\Http\Request\Url\UrlWithPath;
use Eophantasy\Http\Request\Url\UrlWithQueries;
use Eophantasy\Http\Request\Url\UrlWrap;
use PHPUnit\Framework\TestCase;

/**
 * A class for testing the RequestWithBody class.
 * 
 * @covers RequestWithBody
 */
final class RequestWithBodyTest extends TestCase
{
    /**
     * Tests the request method.
     * 
     * @return void
     * @covers RequestWithBody::response
     * @covers RequestWithBody::read
     * @covers RequestWithBody::__construct
     * @covers ResponseWithHeaders::__construct
     * @covers ResponseBasic::__construct
     */
    public function testResponse()
    {
        $response = (new RequestWithHeaders(
            new RequestWithBody(
                new RequestBasic(
                    new Post(),
                    new UrlWithQueries(
                        new UrlWithPath(
                            new UrlWrap(
                                new Https(),
                                new Host('httpbin.org')
                            ),
                            new Path('/post')
                        ),
                        new Query('limit', 10),
                        new Query('ok', true)
                    )
                ),
                new JsonBody('{"foo": "bar"}')
            ),
            new Header('Content-Type', 'application/json'),
            new Header('Accept', 'application/json')
        ))->response();

        $jsonDecoded = json_decode(
            $response->read()->toString(),
            true
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
            'https://httpbin.org/post?limit=10&ok=1',
            $jsonDecoded['url']
        );
        $this->assertEquals(
            'httpbin.org',
            $jsonDecoded['headers']['Host']
        );
        $this->assertEquals(
            'application/json',
            $jsonDecoded['headers']['Content-Type']
        );
        $this->assertEquals(
            'application/json',
            $jsonDecoded['headers']['Accept']
        );
        $this->assertEquals(
            'bar',
            $jsonDecoded['json']['foo']
        );
    }
}
