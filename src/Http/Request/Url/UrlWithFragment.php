<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Http\Request\Url;

use Eophantasy\Http\Request\Url\Fragment\Fragment;

/**
 * A class representing a URL with fragments.
 * 
 * A URL with a fragment is a URL that has a fragment component.
 * 
 * @see https://developer.mozilla.org/en-US/docs/Web/API/URL/fragment
 */
final class UrlWithFragment implements Url
{
    /**
     * The original URL.
     * 
     * @var Url
     */
    private $origin;

    /**
     * The fragment.
     * 
     * @var Fragment
     */
    private $fragment;

    /**
     * The URL.
     * 
     * @param Url $url The original URL.
     * @param Fragment $fragment The fragment.
     */
    public function __construct(Url $url, Fragment $fragment)
    {
        $this->origin = $url;
        $this->fragment = $fragment;
    }

    /**
     * Returns the string representation of the URL.
     * 
     * @return string
     */
    public function __toString(): string
    {
        return sprintf('%s#%s', $this->origin, $this->fragment);
    }
}