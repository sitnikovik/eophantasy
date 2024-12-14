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

use Eophantasy\Http\Request\Url\Host\Host;
use Eophantasy\Http\Request\Url\Protocol\Protocol;

/**
 * A wrap class representing a URL without a path.
 * 
 * @see https://developer.mozilla.org/en-US/docs/Web/API/URL
 */
final class UrlWrap implements Url
{
    /**
     * The URL protocol.
     * 
     * @var Protocol
     */
    private Protocol $protocol;

    /**
     * The URL host.
     * 
     * @var Host
     */
    private Host $host;

    /**
     * Creates a new URL.
     * 
     * @param Protocol $protocol The URL protocol.
     * @param Host $host The URL host.
     */
    public function __construct(Protocol $protocol, Host $host)
    {
        $this->protocol = $protocol;
        $this->host = $host;
    }

    /**
     * Returns the string representation of the URL.
     * 
     * @return string
     */
    public function __toString(): string
    {
        return $this->protocol . '://' . $this->host;
    }
}
