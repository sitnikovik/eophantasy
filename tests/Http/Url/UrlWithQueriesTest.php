<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Test\Http\Request\Url;

use Eophantasy\Http\Request\Url\Query\Query;
use Eophantasy\Http\Request\Url\Host\Host;
use Eophantasy\Http\Request\Url\Protocol\Https;
use Eophantasy\Http\Request\Url\UrlWrap;
use Eophantasy\Http\Request\Url\UrlWithQueries;
use PHPUnit\Framework\TestCase;

/**
 * Tests the URL with queries.
 * 
 * @covers \Eophantasy\Http\Request\Url\UrlWithQueries
 */
final class UrlWithQueriesTest extends TestCase
{
    /**
     * Tests the string representation of the URL.
     * 
     * @return void
     * @covers \Eophantasy\Http\Request\Url\UrlWithQueries::__toString
     * @covers \Eophantasy\Http\Request\Url\UrlWrap::__toString
     * @covers \Eophantasy\Http\Request\Url\Protocol\Https::__toString
     * @covers \Eophantasy\Http\Request\Url\Host\Host::__toString
     * @covers \Eophantasy\Http\Request\Url\Query\Query::__toString
     */
    public function testToString(): void
    {
        $url = new UrlWithQueries(
            new UrlWrap(
                new Https(),
                new Host('example.com'),
            ),
            new Query('q', 'search'),
            new Query('ok', true),
            new Query('limit', 10),
        );

        $this->assertEquals(
            'https://example.com?q=search&ok=1&limit=10',
            $url->__toString()
        );
    }
}
