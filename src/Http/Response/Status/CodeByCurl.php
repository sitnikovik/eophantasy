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
        $code = 200;
        switch (curl_errno($curlHandle)) {
            case CURLE_OK:
                $code = 200;
                break;
            case CURLE_COULDNT_RESOLVE_HOST:
                $code = 6;
                break;
            case CURLE_COULDNT_CONNECT:
                $code = 7;
                break;
            case CURLE_OPERATION_TIMEDOUT:
                $code = 28;
                break;
            default:
                $code = 500;
                break;
        }

        parent::__construct($code);
    }
}