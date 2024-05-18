<?php

namespace Mrfansi\Xendit;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\Response;
use Mrfansi\Xendit\Data\Invoice\CreateInvoiceData;

class XenditInvoice extends Xendit
{
    private string $endpoint;

    public function __construct($endpoint = '/v2/invoices')
    {
        parent::__construct();
        $this->endpoint = $endpoint;

    }

    public function getForUserID(): ?string
    {
        return $this->headers['for-user-id'];
    }

    public function setForUserID(?string $forUserID): static
    {
        $this->setHeaders(['for-user-id' => $forUserID]);

        return $this;
    }

    public function getWithSplitRule(): ?string
    {
        return $this->headers['with-split-rule'];
    }

    public function setWithSplitRule(?string $withSplitRule): static
    {
        $this->setHeaders(['with-split-rule' => $withSplitRule]);

        return $this;
    }

    /**
     * @throws ConnectionException
     */
    public function create(array $invoiceData, ?string $for_user_id = null, ?string $with_split_rule = null): PromiseInterface|Response
    {
        $this->setForUserID($for_user_id);
        $this->setWithSplitRule($with_split_rule);

        return $this->request('POST', $this->endpoint, CreateInvoiceData::from($invoiceData)->toArray());

    }
}
