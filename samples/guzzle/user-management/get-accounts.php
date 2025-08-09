<?php

// Guzzle ile çalışmak için autoload dosyasını dahil etmeniz gerekir.
// "composer require guzzlehttp/guzzle" komutu ile Guzzle'ı projenize kurduktan sonra 
// aşağıdaki gibi "vendor/autoload.php" yi dahil edebilirsiniz.
require __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

// İlgili döküman linki: https://documenter.getpostman.com/view/41276314/2sAYQanXhy#2a30ab23-3d6a-476e-9e4d-053d2887626c

// API anahtarınızı buraya yerleştirin
$apiKey = 'API_ANAHTARINIZI_BURAYA_YAZIN';

// Guzzle Client oluşturun
$client = new Client();

try {
    /*
    * cURL karşılığı:
    *     curl --location 'https://api.plexorin.com/get-accounts' \
    *     --header 'Authorization: Bearer apiKey'
    * Guzzle ile aynı isteği yapıyoruz:
    */
    $response = $client->request('GET', 'https://api.plexorin.com/get-accounts', [
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
    *    {
    *       "id": 1,
    *       "platform": "instagram",
    *       "account_username": "plexorin.tr",
    *       "account_name": "Plexorin",
    *       "connection_date": "2025-01-01 00:00:00"
    *   },
    *   {
    *       "id": 2,
    *       "platform": "youtube",
    *       "account_username": "Plexorin",
    *       "account_name": "plexorin",
    *       "connection_date": "2025-01-01 00:00:00"
    *   }
    * }
    */

    echo $body;

} catch (GuzzleException $e) {
    // Guzzle kaynaklı bir hata oluşması durumunda hata mesajını yakalayalım
    echo 'Guzzle Hatası: ' . $e->getMessage();
}
