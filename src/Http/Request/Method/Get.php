<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Http\Request\Method;

/**
 * A class representing a GET HTTP method.
 * 
 * The GET method is used to retrieve information from the given server using a given URI.
 * Requests using GET should only retrieve data.
 * 
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Methods/GET
 */
final class Get implements Method
{
    /**
     * Returns the string representation of the query.
     * 
     * @return string
     */
    public function __toString(): string
    {
        return 'GET';
    }
}