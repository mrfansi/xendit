<?php

namespace Mrfansi\Xendit\Responses;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Mrfansi\Xendit\Exceptions\ResponseException;
use Mrfansi\Xendit\Responses\Traits\CheckStatus;

class InvoiceResponse
{
    use CheckStatus;

    public function __construct(
        protected PromiseInterface|Response $response
    ) {
    }

    /**
     * @throws ResponseException
     */
    public function toJson()
    {
        if (! $this->ok()) {
            $error = $this->response->json();
            throw new ResponseException($error);
        }

        return $this->response->json();
    }

    public function toArray()
    {
        return $this->toJson();
    }
}
