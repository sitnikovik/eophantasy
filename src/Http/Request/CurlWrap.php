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
use Eophantasy\Http\Response\Response;
use Eophantasy\Http\Response\ResponseBasic;
use Exception;

/**
 * A class representing a cURL wrapper.
 * 
 * This class is used to send cURL requests to a server.
 * 
 * @see https://www.php.net/manual/ru/book.curl.php
 */
final class CurlWrap
{
    /**
     * The cURL handle.
     * 
     * @var CurlHandle
     */
    private $curlHandle;

    /**
     * Creates a new cURL wrapper.
     * 
     * @param CurlHandle $curlHandle The cURL handle.
     */
    public function __construct(CurlHandle $curlHandle)
    {
        $this->curlHandle = $curlHandle;
    }

    /**
     * Sends the cURL request and returns the response.
     * 
     * @return Response
     * @throws Exception If the request fails.
     */
    public function response(): Response
    {
        $startMs = microtime(true);
        $response = curl_exec($this->curlHandle);
        $endMs = microtime(true);
        curl_close($this->curlHandle);

        if ($response === false) {
            $methodUsed = curl_getinfo($this->curlHandle, CURLINFO_EFFECTIVE_METHOD);
            $urlReqeusted  = curl_getinfo($this->curlHandle, CURLINFO_EFFECTIVE_URL);
            $errorMessage = curl_error($this->curlHandle);

            throw new Exception(sprintf(
                'The %s request to %s failed: %s',
                $methodUsed,
                $urlReqeusted,
                $errorMessage
            ));
        }

        return new ResponseBasic($response, $startMs, $endMs);
    }
}
