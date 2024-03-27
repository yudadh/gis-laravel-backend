Instalasi :

1. Buat file konfigurasi dengan cara mengcopy file .env.example menjadi .env
2. Buatlah sebuah database baru pada server database mysql anda
3. Pastikan setting koneksi ke database (server, database name, username, password dan port) pada file .env sudah dilakukan dengan benar
4. Jalankan perintah "composer install" untuk menginstall library yg dibutuhkan
5. Jalankan perintah "php artisan migrate" untuk mengenerate tabel user ke database
6. Jalankan perintah "php artisan jwt:secret" untuk mengenerate jtw secret
7. Jalankan perintah "php artisan key:generate" untuk mengenerate key-aplikasi
8. Gunakan aplikasi api client (Postman atau ThunderClient (vscode)) untuk mengakses API
    Contoh :

    - Untuk register user
        POST    /api/register

        body : {
                    "email"     : "manpits@gmail.com",
                    "password"  : "123456",
                    "name"      : "manpits"
                }    

    - Untuk login user
        POST /api/login

        body : {
                    "email"     : "manpits@gmail.com",
                    "password"  : "123456"
                }    

9. Untuk selengkapnya silahkan nanti tambahkan routes yang anda miliki di file routes/api.php

    Route::post('login', [ApiController::class, 'authenticate']);
    Route::post('register', [ApiController::class, 'register']);
    Route::group(['middleware' => ['jwt.verify']], function () {
        Route::get('logout', [ApiController::class, 'logout']);
        Route::get('getuser', [ApiController::class, 'get_user']);
        /**
        * Silahkan tambahkan routes anda disini ...
        */
    });
