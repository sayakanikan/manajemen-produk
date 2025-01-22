# Product Management System
Aplikasi manajemen produk yang bisa digunakan untuk memanajemen produk, kategori, stok produk dan juga pembelian produk

### Instruksi Instalasi
1. Clone repo ke local
2. Buat file .env di root folder dan copykan isinya dari .env.example
3. Konfigurasi db sesuai db di local di file .env
4. Jalankan perintah `composer install` di terminal
5. Jalankan perintah `php artisan key:generate` di terminal
6. Jalankan perintah `php artisan migrate --seed` di terminal
7. Jalankan perintah `php artisan storage:link` di terminal
8. Jalankan perintah `php artisan serve` di terminal

### Daftar Fitur tersedia
1. Login-Logout-Register
2. CRUD Kategori
3. CRUD Produk
4. Pembelian Produk
