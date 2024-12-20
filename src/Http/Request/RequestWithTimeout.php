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
use Eophantasy\Time\Duration\Duration;

final class RequestWithTimeout implements Request
{
    /**
     * Constructs a new request with a timeout.
     * 
     * @param Request $request The request.
     * @param Duration $timeout The request timeout.
     */
    public function __construct(
        private Request $request,
        private Duration $timeout
    ) {}

    /**
     * @inheritDoc
     * @override
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
        $curl = $this->request->cURL();

        curl_setopt($curl, CURLOPT_TIMEOUT, $this->timeout->seconds());

        return $curl;
    }
}