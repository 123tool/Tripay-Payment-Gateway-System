## Tripay Payment Integration

![PHP](https://img.shields.io/badge/PHP-7.4%2B-blue.svg)
![Tripay](https://img.shields.io/badge/Payment-Tripay-orange.svg)
![Status](https://img.shields.io/badge/Open%20Source-Yes-green.svg)

Script integrasi API Tripay untuk pembuatan invoice otomatis disertai fitur callback notifikasi ke Telegram & WhatsApp. Cocok untuk panel PPOB, SMM, atau Top Up Game.

## 🚀 Fitur
- **Closed Payment System:** Mendukung berbagai channel (VA, Retail, E-Wallet).
- **Secure Callback:** Validasi signature HMAC-SHA256 agar terhindar dari manipulasi data.
- **Auto Notification:** Notifikasi real-time ke Telegram Bot saat pembayaran sukses.
- **Clean Code:** Struktur terpisah antara konfigurasi dan logika.

## Setting API :
Buka file src/config.php dan masukkan API Key, Private Key, dan Merchant Code dari Dashboard Tripay Anda.

## ​Setting Callback :
​Masukkan URL https://domain-mu.com/src/callback.php di dashboard Tripay.
​Pastikan SSL (HTTPS) sudah aktif.

## ​Jalankan :
Akses file src/create.php untuk mulai mencoba membuat transaksi.

## ​📦 Requirements :
​PHP 7.4 keatas
​Library cURL aktif
​Akun Tripay (Mode Production/Sandbox)
