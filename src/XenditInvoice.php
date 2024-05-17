<?php

namespace Mrfansi\Xendit;

use Illuminate\Http\Client\ConnectionException;

class XenditInvoice extends Xendit
{
    private string $endpoint;

    public function __construct($endpoint = '/v2/invoices')
    {
        parent::__construct();
        $this->endpoint = $endpoint;

    }

    /**
     * @throws ConnectionException
     */
    public function create(array $invoiceData)
    {
        $response = $this->request('POST', $this->endpoint, $invoiceData);

        return $response->json();
    }
}
