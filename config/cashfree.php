<?php

return [
    //These are for the Marketplace
    'appID' => '12467023c176090bfb5777bc02076421',
    'secretKey' => 'd780dc852cbcdec4698ee19b4e3f81e282994883',
    'testURL' => 'https://ces-gamma.cashfree.com',
    'prodURL' => 'https://ces-api.cashfree.com',
    'maxReturn' => 100, //this is for request pagination
    'isLive' => true,

    //For the PaymentGateway.
    'PG' => [
        'appID' => '12467023c176090bfb5777bc02076421',
        'secretKey' => 'd780dc852cbcdec4698ee19b4e3f81e282994883',
        'testURL' => 'https://test.cashfree.com',
        'prodURL' => 'https://api.cashfree.com',
        'isLive' => true
    ]
];
