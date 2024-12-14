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

use Eophantasy\Http\Request\Url\Fragment\Fragment;
use Eophantasy\Http\Request\Url\UrlWithFragment;
use Eophantasy\Http\Request\Url\Host\Host;
use Eophantasy\Http\Request\Url\Protocol\Http;
use Eophantasy\Http\Request\Url\UrlWithoutPath;
use PHPUnit\Framework\TestCase;

/**
 * Tests the URL with fragment.
 * 
 * @covers \Eophantasy\Http\Request\Url\UrlWithFragment
 */
final class UrlWithFragmentTest extends TestCase
{
    /**
     * Tests the string representation of the URL.
     * 
     * @return void
     * @covers \Eophantasy\Http\Request\Url\UrlWithFragment::__toString
     * @covers \Eophantasy\Http\Request\Url\UrlWithoutPath::__toString
     * @covers \Eophantasy\Http\Request\Url\Protocol\Http::__toString
     * @covers \Eophantasy\Http\Request\Url\Host\Host::__toString
     * @covers \Eophantasy\Http\Request\Url\Fragment\Fragment::__toString
     */
    public function testToString(): void
    {
        $url = new UrlWithFragment(
            new UrlWithoutPath(
                new Http(),
                new Host('example.com'),
            ),
            new Fragment('section'),
        );

        $this->assertEquals(
            'https://example.com#section',
            $url->__toString()
        );
    }
}
