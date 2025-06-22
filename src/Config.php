<?php
namespace FBRInvoicing;

class Config
{
    public string $token;
    public string $posId;
    public string $environment;

    public function __construct(array $config)
    {
        $this->token = $config['token'];
        $this->posId = $config['pos_id'];
        $this->environment = $config['env'] ?? 'sandbox';
    }

    public function getApiUrl(): string
    {
        return $this->environment === 'production'
            ? 'https://gw.fbr.gov.pk/pdi/v1/api/DigitalInvoicing/PostInvoiceData_v1'
            : 'https://esp.fbr.gov.pk:8244/DigitalInvoicing/v1/PostInvoiceData_v1';
    }
}
