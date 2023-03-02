<?php

use App\Http\Controllers\Api\Game\GameController;
use Illuminate\Http\Request;
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
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::prefix('game')
        ->as('game.')
        ->group(static function (): void {
            Route::get('/', \App\Http\Controllers\Api\Game\IndexController::class)
                ->name('index');

            Route::get('/new', [GameController::class, 'new'])->name('new');


            Route::post('/play/{hash}', [GameController::class, 'play'])
                ->name('play');
        });
});
