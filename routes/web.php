<?php

use App\Http\Controllers\TestController;
use Enrise\LaravelSonar\Infrastructure\Actions\DashboardAction;
use Enrise\LaravelSonar\Infrastructure\Actions\TransactionResolveAction;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/sonar')->group(function() {
    Route::get('/', \Enrise\LaravelSonar\Infrastructure\Actions\DashboardAction::class);
    Route::post('/transactions/resolve', \Enrise\LaravelSonar\Infrastructure\Actions\TransactionResolveAction::class);
});
