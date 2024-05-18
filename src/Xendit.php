<?php

namespace Mrfansi\Xendit;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class Xendit
{
    protected string $baseUrl = 'https://api.xendit.co';

    protected string $secretKey;

    protected string $publicKey;

    protected string $webhookToken;

    protected array $headers = ['Content-Type', 'application/json'];

    protected ?string $forUserID = null;

    protected ?string $withSplitRule = null;

    public function __construct()
    {
        $this->secretKey = config('xendit.secret_key');
        $this->publicKey = config('xendit.public_key');
        $this->webhookToken = config('xendit.webhook_token');
    }

    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    public function setBaseUrl(string $baseUrl): static
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }

    public function getSecretKey(): string
    {
        return $this->secretKey;
    }

    public function setSecretKey(string $secretKey): static
    {
        $this->secretKey = $secretKey;

        return $this;
    }

    public function getPublicKey(): string
    {
        return $this->publicKey;
    }

    public function setPublicKey(string $publicKey): static
    {
        $this->publicKey = $publicKey;

        return $this;
    }

    public function getWebhookToken(): string
    {
        return $this->webhookToken;
    }

    public function setWebhookToken(string $webhookToken): static
    {
        $this->webhookToken = $webhookToken;

        return $this;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function setHeaders(array $headers): static
    {
        $this->headers += $headers;

        return $this;
    }

    /**
     * @throws ConnectionException
     */
    public function request(string $method, string $uri, array $paramsOrData = []): PromiseInterface|Response
    {
        return Http::baseUrl($this->baseUrl)
            ->withBasicAuth($this->secretKey, '')
            ->withHeaders($this->headers)
            ->{$method}($uri, $paramsOrData);
    }

    public static function invoice(): XenditInvoice
    {
        return new XenditInvoice();
    }
}
