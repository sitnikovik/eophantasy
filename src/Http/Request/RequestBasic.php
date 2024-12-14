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
use Eophantasy\Http\Request\Method\Get;
use Eophantasy\Http\Request\Method\Method;
use Eophantasy\Http\Request\Url\Url;
use Eophantasy\Http\Response\Response;
use Eophantasy\Http\Response\ResponseBasic;
use Exception;

/**
 * A class representing an HTTP request.
 * 
 * This class is used to send HTTP requests to a server.
 * 
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP
 */
final class RequestBasic extends Request
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
                'The %s request to %s failed: %s',
                $this->method,
                $this->url,
                curl_error($curl)
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
     */
    public function toCurlHandle(): CurlHandle
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, (string)$this->url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, (string)$this->method);
        if ($this->method != new Get()) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, (string)$this->url);
        }

        return $curl;
    }
}
