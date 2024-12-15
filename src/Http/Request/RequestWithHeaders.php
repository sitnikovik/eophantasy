<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Http\Request;

use CurlHandle;
use Eophantasy\Http\Request\Header\Header;
use Eophantasy\Http\Response\Response;

/**
 * A class represents a request with headers.
 * 
 * This class is a decorator for the request.
 * 
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers
 */
final class RequestWithHeaders implements Request
{
    /**
     * The origin request.
     * 
     * @var Request
     */
    private $origin;

    /**
     * The request headers.
     * 
     * @var Header[]
     */
    private $headers;

    /**
     * Creates a new request.
     * 
     * @param Request $request The request.
     * @param Header[] $headers The request headers.
     */
    public function __construct(Request $request, Header ...$headers)
    {
        $this->origin = $request;
        $this->headers = $headers;
    }
    
    /**
     * @inheritDoc
     * @throws Exception If the request is invalid.
     */
    public function response(): Response
    {
        return (new CurlWrap(
            $this->cURL()
        ))->response();
    }

    /**
     * @inheritDoc
     */
    public function cURL(): CurlHandle
    {
        $curl = $this->origin->cURL();

        $headers = array_map(function (Header $header) {
            return (string) $header;
        }, $this->headers);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        return $curl;
    }
}
