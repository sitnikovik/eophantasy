<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Http\Request\Url\Host;

use Stringable;

/**
 * A class representing a host name.
 * 
 * The host is the part of the URL that comes after the scheme.
 * and before the path and looks like this: https://"example.com"/path/to/resource.
 * 
 * @see https://tools.ietf.org/html/rfc3986#section-3.2.2
 */
final class Host implements Stringable
{
    /**
     * The host name.
     * 
     * @var string
     */
    private string $host;

    /**
     * Creates a new host.
     * 
     * @param string $host The host name like "example.com"
     */
    public function __construct(string $host)
    {
        $this->host = $host;
    }

    /**
     * Returns the string representation of the host.
     * 
     * @return string
     */
    public function __toString(): string
    {
        return $this->host;
    }
}