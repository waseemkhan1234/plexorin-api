<?php

// İlgili döküman linki: https://documenter.getpostman.com/view/41276314/2sAYQanXhy#fc332a1a-fed6-47cf-9091-cf6fc040f9c3

// API anahtarınızı buraya yerleştirin
$apiKey = 'API_ANAHTARINIZI_BURAYA_YAZIN';

// Gönderilecek JSON verisi
$data = [
    "content_id"       => 12345,
];

// cURL oturumunu başlat
$curl = curl_init();

// cURL seçeneklerini ayarla
curl_setopt_array($curl, [
    CURLOPT_URL            => 'https://api.plexorin.com/delete-content',
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
    *    "message": "Content successfully deleted."
    * }
    */
    echo $response;
}

// cURL oturumunu kapat
curl_close($curl);
