<?php

use App\Http\Controllers\Api\Game\GameController;
use App\Http\Controllers\Api\Game\IndexController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;


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

Route::middleware('auth:sanctum')->group(static function (): void {

    Route::prefix('game')
        ->as('game.')
        ->group(static function (): void {

            Route::get('/', IndexController::class)->name('index');

            Route::get('/new', [GameController::class, 'new'])->name('new');

            Route::post('/play/{hash}', [GameController::class, 'play'])->name('play');

        });
});

Route::post('/login', [AuthController::class, 'loginUser'])->name('login');
