<?php

require __DIR__.'/vendor/autoload.php';

$client = new \GuzzleHttp\Client([
    'base_url' => 'https://symfony-playground.paymill.dev',
    'defaults' => [
        'exceptions' => false,
    ]
]);

$nickname = 'ObjectOrienter'.rand(0, 999);
$data = [
    'nickname' => $nickname,
    'avatarNumber' => 5,
    'tagLine' => 'a test dev!'
];

// 1) POST to create the programmer
$response = $client->post('/api/programmers', [
    'body' => json_encode($data)
]);

$programmerUrl = $response->getHeader('Location');

// 2) GET to fetch that programmer
$response = $client->get($programmerUrl);

// 3) GET a collection
$response = $client->get('/api/programmers');

echo $response;
echo PHP_EOL.PHP_EOL;
