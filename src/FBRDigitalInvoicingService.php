<?php
namespace FBRInvoicing;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class FBRDigitalInvoicingService
{
    protected Config $config;
    protected Client $http;

    public function __construct(array $config)
    {
        $this->config = new Config($config);
        $this->http = new Client([
            'base_uri' => $this->config->getApiUrl(),
            'timeout'  => 10,
        ]);
    }

    public function postInvoice(array $invoiceData): array
    {
        $invoiceData['bposid'] = $this->config->posId;

        try {
            $response = $this->http->post('', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->config->token,
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                ],
                'json' => $invoiceData,
            ]);

            return json_decode((string) $response->getBody(), true);

        } catch (RequestException $e) {
            return [
                'statusCode'   => $e->getCode(),
                'errorMessage' => $e->getMessage(),
                'errors'       => method_exists($e, 'getResponse') ? json_decode((string) $e->getResponse()?->getBody(), true) : null,
            ];
        }
    }
}
