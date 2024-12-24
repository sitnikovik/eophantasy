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
use Eophantasy\Http\Response\Status\Code;
use Eophantasy\Http\Response\Status\CodeByCurl;
use Eophantasy\Time\Duration\Now;
use Eophantasy\Time\Duration\Since;

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
     */
    public function response(): Response
    {
        $startDur = new Now();
        $response = curl_exec($this->curlHandle);
        $resposeEnded = new Since($startDur);
        curl_close($this->curlHandle);

        if ($response === false) {
            return new ResponseBasic(
                curl_error($this->curlHandle),
                new CodeByCurl($this->curlHandle),
                $resposeEnded
            );
        }

        return new ResponseBasic(
            $response,
            new Code(curl_getinfo($this->curlHandle, CURLINFO_HTTP_CODE)),
            $resposeEnded
        );
    }
}
