Instalasi :

1. Buat sebuah folder baru, kemudian pull repo ini
	mkdir api-test
	cd api-test
	git init
	git remote add origin https://github.com/manpits/api-jwt-master.git
	git pull origin main

2. Buat file konfigurasi dengan cara mengcopy file .env.example menjadi .env
3. Buatlah sebuah database baru pada server database mysql anda
4. Pastikan setting koneksi ke database (server, database name, username, password dan port) pada file .env sudah dilakukan dengan benar
5. Jalankan perintah "composer install" untuk menginstall library yg dibutuhkan
6. Jalankan perintah "php artisan migrate" untuk mengenerate tabel user ke database
7. Jalankan perintah "php artisan jwt:secret" untuk mengenerate jtw secret
8. Jalankan perintah "php artisan key:generate" untuk mengenerate key-aplikasi
9. Gunakan aplikasi api client (Postman atau ThunderClient (vscode)) untuk mengakses API
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

10. Untuk selengkapnya silahkan nanti tambahkan routes yang anda miliki di file routes/api.php

    Route::post('login', [ApiController::class, 'authenticate']);
    Route::post('register', [ApiController::class, 'register']);
    Route::group(['middleware' => ['jwt.verify']], function () {
        Route::get('logout', [ApiController::class, 'logout']);
        Route::get('getuser', [ApiController::class, 'get_user']);
        /**
        * Silahkan tambahkan routes anda disini ...
        */
    });
