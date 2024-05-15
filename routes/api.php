<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\HospitalController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [ApiController::class, 'authenticate']);
Route::post('register', [ApiController::class, 'register']);
Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('logout', [ApiController::class, 'logout']);
    Route::get('getuser', [ApiController::class, 'get_user']);
    /**
      * Silahkan tambahkan route anda disini ...
    */
    Route::get('hospitals', [HospitalController::class, 'index']);
    Route::get('hospitals/{hospital}', [HospitalController::class, 'show']);
    Route::post('hospitals', [HospitalController::class, 'store']);
    Route::put('hospitals/{hospital}', [HospitalController::class, 'update']);
    Route::delete('hospitals/{hospital}', [HospitalController::class, 'destroy']);
});
