<?php

// Guzzle ile çalışmak için autoload dosyasını dahil etmeniz gerekir.
// "composer require guzzlehttp/guzzle" komutu ile Guzzle'ı projenize kurduktan sonra 
// aşağıdaki gibi "vendor/autoload.php" yi dahil edebilirsiniz.
require __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

// İlgili döküman linki: https://documenter.getpostman.com/view/41276314/2sAYQanXhy#50b40dd2-c907-45d9-9e81-383198f92e75

// API anahtarınızı buraya yerleştirin
$apiKey = 'API_ANAHTARINIZI_BURAYA_YAZIN';

// Guzzle Client oluşturun
$client = new Client();

try {
    /*
    * cURL karşılığı:
    *     curl --location 'https://api.plexorin.com/me' \
    *     --header 'Authorization: Bearer apiKey'
    * Guzzle ile aynı isteği yapıyoruz:
    */
    $response = $client->request('GET', 'https://api.plexorin.com/me', [
        'headers' => [
            'Authorization' => 'Bearer ' . $apiKey
        ]
    ]);

    // Dönen yanıtı alalım
    $body = (string) $response->getBody();

    /*
    * Örnek başarılı yanıt (json):
    * {
    *    "code": 200,
    *    "data": {
    *        "id": 1,
    *        "domain": null,
    *        "api_key": "",
    *        "total_publish": 0,
    *        "connected_at": "2025-01-19 00:00:00",
    *        "created_at": "2025-01-19 00:00:00"
    *    }
    * }
    */

    echo $body;

} catch (GuzzleException $e) {
    // Guzzle kaynaklı bir hata oluşması durumunda hata mesajını yakalayalım
    echo 'Guzzle Hatası: ' . $e->getMessage();
}
