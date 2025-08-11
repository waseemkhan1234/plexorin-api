<?php

// Guzzle ile çalışmak için autoload dosyasını dahil etmeniz gerekir.
// "composer require guzzlehttp/guzzle" komutu ile Guzzle'ı projenize kurduktan sonra 
// aşağıdaki gibi "vendor/autoload.php" yi dahil edebilirsiniz.
require __DIR__ . '/vendor/autoload.php';

// İlgili döküman linki: https://documenter.getpostman.com/view/41276314/2sAYQanXhy#fc332a1a-fed6-47cf-9091-cf6fc040f9c3

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

// API anahtarınızı buraya yerleştirin
$apiKey = 'API_ANAHTARINIZI_BURAYA_YAZIN';

// Gönderilecek JSON verisi
$data = [
    "content_id" => 12345,
];

// Guzzle Client örneği oluştur
$client = new Client();

try {
    // create-content endpoint’ine POST isteği gönder
    $response = $client->request('POST', 'https://api.plexorin.com/delete-content', [
        'headers' => [
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type'  => 'application/json'
        ],
        // Göndereceğimiz veriyi `json` parametresi üzerinden tanımlıyoruz
        'json' => $data
    ]);

    // Dönen yanıtı alalım
    $body = (string) $response->getBody();

    /*
    * Örnek başarılı yanıt (json):
    * {
    *    "code": 200,
    *    "message": "Content successfully deleted."
    * }
    */
    echo $body;

} catch (GuzzleException $e) {
    // Guzzle kaynaklı bir hata oluşursa
    echo 'Guzzle Hatası: ' . $e->getMessage();
}
