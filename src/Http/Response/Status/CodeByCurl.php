<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Http\Response\Status;

use CurlHandle;

/**
 * A class representing an HTTP response status code with cURL handling.
 * 
 * It is immutable, meaning that its value cannot be changed after it is created.
 */
final class CodeByCurl extends Code
{
    /**
     * Constructs a new status code from a cURL response.
     * 
     * @param CurlHandle $curlHandle The cURL handle.
     * @override
     */
    public function __construct(CurlHandle $curlHandle)
    {
        switch (curl_errno($curlHandle)) {
            case CURLE_OPERATION_TIMEDOUT:
                $code = 504; // Gateway Timeout
                break;
            case CURLE_COULDNT_RESOLVE_HOST:
            case CURLE_COULDNT_CONNECT:
                $code = 502; // Bad Gateway
                break;
            case CURLE_SSL_CONNECT_ERROR:
                $code = 495; // SSL Certificate Error
                break;
            case CURLE_HTTP_RETURNED_ERROR:
                $code = 500; // Internal Server Error
                break;
            case CURLE_TOO_MANY_REDIRECTS:
                $code = 310; // Too Many Redirects
                break;
            default:
                $code = 200;
                break;
        }

        parent::__construct($code);
    }
}