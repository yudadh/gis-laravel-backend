Instalasi :

1. Buat file konfigurasi dengan cara mengcopy file .env.example menjadi .env
2. Buatlah sebuah database baru pada server database mysql anda
3. Pastikan setting koneksi ke database (server, database name, username, password dan port) pada file .env sudah dilakukan dengan benar
4. Jalankan perintah "php artisan jwt:secret" untuk mengenerate jtw secret
5. Jalankan perintah "php artisan key:generate" untuk mengenerate key-aplikasi
6. Jalankan perintah "composer install" untuk menginstall library yg dibutuhkan
7. Jalankan perintah "php artisan migrate" untuk mengenerate tabel user ke database

