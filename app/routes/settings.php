<?php

$GATEWAY_BASE_URL="https://test-gateway.mastercard.com";
$GATEWAY_MERCHANT_ID = "CS155150720";
$GATEWAY_API_PASSWORD="8249bd655d5181eb3cf7719b25eecd04";
$GATEWAY_DEFAULT_CURRENCY="USD";
$GATEWAY_API_VERSION=45;


return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'gateway-php-sample-code',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
        //Details needed for Merchant creation. Use ReadMe for details on how to set these variables.
        'configArray' => [
            'gatewayBaseUrl' => $GATEWAY_BASE_URL,
            'pkiBaseUrl' => getenv('PKI_BASE_URL'),
            'hostedSessionUrl' => $GATEWAY_BASE_URL . '/form',
            'gatewayUrl' => $GATEWAY_BASE_URL . '/api/rest',
            'merchantId' => $GATEWAY_MERCHANT_ID,
            'apiUsername' => "merchant." . $GATEWAY_MERCHANT_ID,
            'password' => $GATEWAY_API_PASSWORD,
            'debug' => 'FALSE',
            'version' => $GATEWAY_API_VERSION ?: '45' ,
            'currency' => getenv('GATEWAY_DEFAULT_CURRENCY') ?: 'USD',
            'certificatePath' => getenv('GATEWAY_SSL_CERT_PATH'),
            //IMPORTANT: Ensure that you set these flags to TRUE in Production. The Test certificate is self signed and doesn't really need these to be set in Development.
            // By default they are set to PRODUCTION env values
            'verifyPeer' => getenv('VERIFY_PEER') ?: TRUE,
            'verifyHost' => getenv('VERIFY_HOST') ?: 1
        ]

    ],
];
