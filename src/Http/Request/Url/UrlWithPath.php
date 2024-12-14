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

use Eophantasy\Http\Request\Url\Path\Path;

/**
 * A class represents a URL with a path.
 * 
 * A URL with a path is a string that represents a Uniform Resource Locator with a path.
 * 
 * @see https://developer.mozilla.org/en-US/docs/Web/API/URL/pathname
 */
final class UrlWithPath implements Url
{
    /**
     * The origin URL.
     * 
     * @var Url
     */
    private $origin;

    /**
     * The URL path.
     * 
     * @var Path
     */
    private Path $path;

    /**
     * Creates a new URL.
     * 
     * @param Protocol $protocol The URL protocol.
     * @param Host $host The URL host.
     * @param Path $path The URL path.
     */
    public function __construct(Url $url, Path $path)
    {
        $this->origin = $url;
        $this->path = $path;
    }

    /**
     * Returns the string representation of the URL.
     * 
     * @return string
     */
    public function __toString(): string
    {
        return $this->origin . $this->path;
    }
}