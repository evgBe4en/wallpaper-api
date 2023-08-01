<?php

use Aws\S3\S3Client;

$client = new S3Client([
    'version' => 'latest',
    'region' => env('AWS_DEFAULT_REGION'),
    'credentials' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
    ],
]);

$result = $client->getObject([
    'Bucket' => env('AWS_BUCKET'),
    'Key' => 'космос.webp',
    'endpoint' => 's3://wallpapers-files/'
]);
