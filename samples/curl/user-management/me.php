<?php

// İlgili döküman linki: https://documenter.getpostman.com/view/41276314/2sAYQanXhy#50b40dd2-c907-45d9-9e81-383198f92e75

// API anahtarınızı buraya yerleştirin
$apiKey = 'API_ANAHTARINIZI_BURAYA_YAZIN';

// cURL oturumunu başlat
$curl = curl_init();

// cURL seçeneklerini ayarla
/* 
* cURL kodu;
*     curl --location 'https://api.plexorin.com/me' \
*     --header 'Authorization: Bearer apiKey'
*/
curl_setopt_array($curl, [
    CURLOPT_URL => 'https://api.plexorin.com/me',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer ' . $apiKey
    ]
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
    *    "data": {
    *        "id": 1,
    *        "domain": null,
    *        "api_key": '',
    *        "usage": {
    *            "total_publish": 0,
    *            "daily_usage": 0
    *        },
    *        "limits": {
    *            "daily_publish_limit": 100,
    *            "account_limit": 20
    *        },
    *        "connected_at": "2025-01-19 00:00:00",
    *        "created_at": "2025-01-19 00:00:00"
    *    }
    * }
    */
    echo $response;
}

// cURL oturumunu kapat
curl_close($curl);
