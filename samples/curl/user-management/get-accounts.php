<?php

// İlgili döküman linki: https://documenter.getpostman.com/view/41276314/2sAYQanXhy#2a30ab23-3d6a-476e-9e4d-053d2887626c

// API anahtarınızı buraya yerleştirin
$apiKey = 'API_ANAHTARINIZI_BURAYA_YAZIN';

// cURL oturumunu başlat
$curl = curl_init();

// cURL seçeneklerini ayarla
/* 
* cURL kodu;
*     curl --location 'https://api.plexorin.com/get-accounts' \
*     --header 'Authorization: Bearer apiKey'
*/
curl_setopt_array($curl, [
    CURLOPT_URL => 'https://api.plexorin.com/get-accounts',
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
    echo $response;
}

// cURL oturumunu kapat
curl_close($curl);
