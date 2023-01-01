<?php

use App\Http\Controllers\MessagesController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'auth',
    'as' => 'auth.',
], function () {
    Route::post('/register', RegistrationController::class)->name('register');
});

Route::group([
    'prefix' => 'messages',
    'as' => 'messages.',
    'middleware' => 'auth:sanctum',
], function () {
    Route::get('/', [MessagesController::class, 'index'])->name('index');
    Route::get('/{message}', [MessagesController::class, 'show'])->name('show');
});

Route::post('messages', [MessagesController::class, 'store'])->name('messages.store');
