<?php

namespace Mrfansi\Xendit\Exceptions;

use Mrfansi\Xendit\Data\Response\ErrorData;

class ResponseException extends \Exception
{
    protected ErrorData $handled;

    public function __construct(array $error)
    {
        $this->handled = ErrorData::from($error);
        parent::__construct($this->handled->message, intval($this->handled->code));
    }

    public function getResponseCode(): string
    {
        return $this->handled->code;
    }

    public function getResponseMessage(): string
    {
        return $this->handled->message;
    }
}
