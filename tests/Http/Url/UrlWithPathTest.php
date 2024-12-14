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

use Eophantasy\Http\Request\Url\Host\Host;
use Eophantasy\Http\Request\Url\Path\Path;
use Eophantasy\Http\Request\Url\Protocol\Https;
use Eophantasy\Http\Request\Url\UrlWithPath;
use Eophantasy\Http\Request\Url\UrlWithoutPath;
use PHPUnit\Framework\TestCase;

/**
 * Tests the URL with a path.
 * 
 * @covers \Eophantasy\Http\Request\Url\UrlWithPath
 */
final class UrlWithPathTest extends TestCase
{
    /**
     * Tests the string representation of the URL.
     * 
     * @return void
     * @covers \Eophantasy\Http\Request\Url\UrlWithPath::__toString
     * @covers \Eophantasy\Http\Request\Url\UrlWithoutPath::__toString
     * @covers \Eophantasy\Http\Request\Url\Protocol\Https::__toString
     * @covers \Eophantasy\Http\Request\Url\Host\Host::__toString
     */
    public function testToString(): void
    {   
        $url = new UrlWithPath(
            new UrlWithoutPath(
                new Https(),
                new Host('example.com'),
            ),
            new Path('/path/to/resource/'),
        );

        $this->assertEquals(
            'https://example.com/path/to/resource/',
            $url->__toString()
        );
    }
}