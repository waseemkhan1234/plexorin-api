<?php

// İlgili döküman linki: https://documenter.getpostman.com/view/41276314/2sAYQanXhy#d20ea5bf-6bd0-4831-8a50-f1bbfd16534f

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

// cURL oturumunu başlat
$curl = curl_init();

// cURL seçeneklerini ayarla
curl_setopt_array($curl, [
    CURLOPT_URL            => 'https://api.plexorin.com/create-content',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST           => true, // POST isteğini belirtir
    CURLOPT_HTTPHEADER     => [
        'Authorization: Bearer ' . $apiKey,
        'Content-Type: application/json'
    ],
    // Göndereceğimiz veriyi JSON’a çevirip POSTFIELDS olarak ekliyoruz
    CURLOPT_POSTFIELDS     => json_encode($data)
]);

// İstek gönder ve cevabı al
$response = curl_exec($curl);

// Eğer cURL ile ilgili bir hata oluşmuşsa, hata mesajını yazdır
if (curl_errno($curl)) {
    echo 'cURL Hatası: ' . curl_error($curl);
} else {
    // Hatasız cURL yanıtı
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
    echo $response;
}

// cURL oturumunu kapat
curl_close($curl);
