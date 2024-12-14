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
use Eophantasy\Http\Response\ResponseBasic;
use Exception;

/**
 * A class representing an HTTP request with body
 * 
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP
 */
final class RequestWithBody extends Request
{
    /**
     * The origin request.
     * 
     * @var Request
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
     */
    public function response(): Response
    {
        $curl = $this->toCurlHandle();

        $startMs = microtime(true);
        $response = curl_exec($curl);
        $endMs = microtime(true);
        curl_close($curl);
        if ($response === false) {
            throw new Exception(sprintf(
                'The request failed: %s', curl_error($curl)
            ));
        }
        $statusCode = (int)curl_getinfo($curl, CURLINFO_HTTP_CODE);

        return new ResponseBasic(
            $response,
            $statusCode,
            $endMs - $startMs
        );
    }

    /**
     * @inheritDoc
     * @override
     */
    public function toCurlHandle(): CurlHandle
    {
        $curl = $this->origin->toCurlHandle();
     
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, (string)$this->body);

        return $curl;
    }
}
