<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Http\Request\Url\Path;

use Stringable;

/**
 * A path implementation.
 * 
 * The path is the part of the URL that comes after the host
 * and looks like this: https://example.com"/path/to/resource"?query=string.
 * 
 * @see https://tools.ietf.org/html/rfc3986#section-3.3
 */
final class Path implements Stringable
{
    /**
     * Url path.
     * 
     * @var string
     */
    private $path;

    /**
     * Creates a new path.
     * 
     * Note that the path must starts and no ends with a slash.
     * 
     * @param string $path The path string like /path/to/resource
     */
    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * Returns the string representation of the path.
     * 
     * @return string
     */
    public function __toString(): string
    {
        return $this->path;
    }
}