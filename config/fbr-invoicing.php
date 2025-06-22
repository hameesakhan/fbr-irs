<?php
return [
    'token' => env('FBR_API_TOKEN'),
    'pos_id' => env('FBR_POS_ID'),
    'env' => env('FBR_ENV', 'sandbox'), // or 'production'
];
