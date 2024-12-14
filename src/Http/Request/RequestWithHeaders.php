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
use Eophantasy\Http\Response\ResponseBasic;
use Exception;

/**
 * A class represents a request with headers.
 * 
 * This class is a decorator for the request.
 * 
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers
 */
final class RequestWithHeaders extends Request
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
     * @override
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
    protected function toCurlHandle(): CurlHandle
    {
        $curl = $this->origin->toCurlHandle();

        $headers = array_map(function (Header $header) {
            return (string) $header;
        }, $this->headers);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        return $curl;
    }
}
