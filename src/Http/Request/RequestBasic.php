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
use Eophantasy\Http\Request\Method\Method;
use Eophantasy\Http\Request\Url\Url;
use Eophantasy\Http\Response\Response;

/**
 * A class representing an HTTP request.
 * 
 * This class is used to send HTTP requests to a server.
 * 
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP
 */
final class RequestBasic implements Request
{
    /**
     * The request method.
     * 
     * @var Method
     */
    private Method $method;

    /**
     * The request URL.
     * 
     * @var Url
     */
    private Url $url;

    /**
     * Creates a new request.
     * 
     * @param Method $method The request method.
     * @param Url $url The request URL.
     */
    public function __construct(Method $method, Url $url)
    {
        $this->method = $method;
        $this->url = $url;
    }

    /**
     * Sends the request and returns the response.
     * 
     * @return Response
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
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, (string)$this->url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, (string)$this->method);

        return $curl;
    }
}
