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
 * A class representing a HTTPS protocol.
 * 
 * The HTTPS protocol is a secure version of the HTTP protocol.
 * It is used to encrypt the data sent between the client and the server.
 * 
 * @see https://developer.mozilla.org/en-US/docs/Glossary/HTTPS
 */
final class Https implements Protocol
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