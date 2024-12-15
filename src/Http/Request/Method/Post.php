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
 * A class representing a POST HTTP method.
 * 
 * The POST method is used to submit an entity to the specified resource, 
 * often causing a change in state or side effects on the server.
 * 
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Methods/POST
 */
final class Post implements Method
{
    /**
     * Returns the string representation of the query.
     * 
     * @return string
     */
    public function __toString(): string
    {
        return 'POST';
    }
}