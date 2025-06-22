# FBR Digital Invoicing API (PHP Package)

A lightweight PHP package for integrating FBR's Digital Invoicing API using GuzzleHttp.

## Installation

```bash
composer require your-vendor/fbr-digital-invoicing
```

## Usage

```php
use FBRInvoicing\FBRDigitalInvoicingService;

$config = [
    'token' => 'your-secure-token',
    'pos_id' => 'your-pos-id',
    'env' => 'sandbox',
];

$service = new FBRDigitalInvoicingService($config);

$response = $service->postInvoice([
    // ...invoice fields here
]);
```

Supports both sandbox and production environments.
