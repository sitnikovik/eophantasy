<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Http\Response;

use Eophantasy\Type\Bytes\Bytes;
use Eophantasy\Type\Bytes\BytesByString;

/**
 * An HTTP basic response.
 * 
 * A response is a message that is sent by a server in response to an HTTP request.
 * 
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Messages
 */
final class ResponseBasic implements Response
{
    /**
     * The body.
     * 
     * @var string
     */
    private $body;

    /**
     * The status code.
     * 
     * @var int
     */
    private $statusCode;

    /**
     * Constructs a new Response.
     * 
     * @param string $body The body.
     * @param int $statusCode The status code.
     */
    public function __construct(string $body, int $statusCode)
    {
        $this->body = $body;
        $this->statusCode = $statusCode;
    }

    /**
     * Reads the body content as bytes.
     * 
     * @return Bytes
     */
    public function read(): Bytes
    {
        return new BytesByString($this->body);
    }

    /**
     * Returns the status code.
     * 
     * @return int
     */
    public function statusCode(): int
    {
        return $this->statusCode;
    }
}
