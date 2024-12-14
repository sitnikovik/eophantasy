<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Http\Request\Body;

/**
 * A class representing a JSON body.
 * 
 * The JSON body is used to send data to the server.
 * 
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Messages
 */
final class JsonBody implements Body
{
    /**
     * The body.
     * 
     * @var string
     */
    private $body;

    /**
     * Creates a new JSON body.
     * 
     * @param string $json The JSON string.
     */
    public function __construct(string $json)
    {
        $this->body = $json;
    }

    /**
     * Returns the string representation of the body.
     * 
     * @return string
     */
    public function __toString(): string
    {
        return $this->body;
    }
}