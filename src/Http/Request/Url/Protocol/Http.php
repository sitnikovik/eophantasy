<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Http\Request\Url\Protocol;

use Eophantasy\Http\Request\Url\Protocol\Protocol;

/**
 * A class representing the HTTP protocol.
 * 
 * The HTTP protocol is used to transfer data between the client and the server.
 * It is the foundation of any data exchange on the Web.
 * 
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP
 */
final class Http implements Protocol
{
    /**
     * Returns the string representation of the query.
     * 
     * @return string
     */
    public function __toString(): string
    {
        return 'https';
    }
}