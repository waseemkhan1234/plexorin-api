<?php

// Guzzle ile çalışmak için autoload dosyasını dahil etmeniz gerekir.
// "composer require guzzlehttp/guzzle" komutu ile Guzzle'ı projenize kurduktan sonra 
// aşağıdaki gibi "vendor/autoload.php" yi dahil edebilirsiniz.
require __DIR__ . '/vendor/autoload.php';

// İlgili döküman linki: https://documenter.getpostman.com/view/41276314/2sAYQanXhy#d20ea5bf-6bd0-4831-8a50-f1bbfd16534f

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

// API anahtarınızı buraya yerleştirin
$apiKey = 'API_ANAHTARINIZI_BURAYA_YAZIN';

// Gönderilecek JSON verisi
$data = [
    "accounts"         => ['account_id_1', 'account_id_2'],
    "title"            => "İçerik Başlığı",
    "description"      => "İçerik açıklama yazısı",
    "content_type"     => "post", // Enum: post/reels/stories/video
    "content_url"      => "Public erişimi olan hostingte video/fotoğraf linki",
    "cover_image_url"  => "Public erişimi olan hostingte kapak fotoğrafı linki",
    "link"             => "https://plexorin.com/tr/",
    "publish_date"     => "2025-01-01 00:00:00"
];

// Guzzle Client örneği oluştur
$client = new Client();

try {
    // create-content endpoint’ine POST isteği gönder
    $response = $client->request('POST', 'https://api.plexorin.com/create-content', [
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
    *    "message": "Content successfully created.",
    *    "data": {
    *        "accounts": ['account_id_1', 'account_id_2'],
    *        "title": "İçerik Başlığı",
    *        "description": "İçerik açıklama yazısı",
    *        "content_type": "İçerik türü", // Enum: post/reels/stories/video
    *        "content_url": "Public erişimi olan hostingte video/fotoğraf linki",
    *        "cover_image_url": "Public erişimi olan hostingte kapak fotoğrafı linki",
    *        "link": "https://plexorin.com/tr/",
    *        "publish_date": "2025-01-01 00:00:00", // içerik paylaşım tarihi
    *        "created_contents_data": [
    *            {
    *                "content_id": 12345,
    *                "account_id": 1,
    *                "platform": "Hesap Platformu",
    *                "content_url": null
    *            }
    *        ]
    *    }
    * }
    */
    /*
    * Örnek hatalı parametre yanıtı (json):
    * {
    *     "code": 400,
    *     "message": "Invalid parameters"
    * }
    */
    echo $body;

} catch (GuzzleException $e) {
    // Guzzle kaynaklı bir hata oluşursa
    echo 'Guzzle Hatası: ' . $e->getMessage();
}
