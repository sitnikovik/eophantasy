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
use Eophantasy\Http\Request\Body\Body;
use Eophantasy\Http\Response\Response;

/**
 * A class representing an HTTP request with body
 * 
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP
 */
final class RequestWithBody implements Request
{
    /**
     * The origin request.
     * 
     * @var RequestByCurl
     */
    private $origin;

    /**
     * The request body.
     * 
     * @var Body
     */
    private Body $body;

    /**
     * Creates a new request.
     * 
     * @param Method $method The request method.
     * @param Url $url The request URL.
     * @param Body $body The request body.
     */
    public function __construct(Request $request, Body $body)
    {
        $this->origin = $request;
        $this->body = $body;
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
     * @override
     */
    public function cURL(): CurlHandle
    {
        $curl = $this->origin->cURL();

        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, (string)$this->body);

        return $curl;
    }
}
