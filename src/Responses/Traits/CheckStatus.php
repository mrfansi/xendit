<?php

namespace Mrfansi\Xendit\Responses\Traits;

trait CheckStatus
{
    public function ok()
    {
        return $this->response->ok();
    }

    public function badRequest()
    {
        return $this->response->badRequest();
    }

    public function notFound()
    {
        return $this->response->notFound();
    }

    public function forbidden()
    {
        return $this->response->forbidden();
    }
}
