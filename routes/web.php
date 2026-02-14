<?php

use App\Http\Controllers\Admin\ClearCacheController;
use Illuminate\Support\Facades\Route;
use App\Models\Settings;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use App\Http\Controllers\AutoTaskController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\CaptchaController;
use App\Jobs\CalculateCopyTradeProfit;
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

require __DIR__ . '/admin/web.php';
require __DIR__ . '/user/web.php';
require __DIR__ . '/botman.php';

Route::get('/run-profit-return', function (Request $request) {
    if ($request->query('key') !== 'remedy6034') {
        abort(403, 'Unauthorized');
    }
    \Artisan::call('process:trades');
    return "Trade processing completed!";
});

Route::get('/run-profit-return', function () {
    \Artisan::call('process:trades');
    return "Trade processing completed!";
})->middleware('auth');


Route::get('/run-copy-trade-job', function () {
    dispatch(new CalculateCopyTradeProfit());
    return "Copy Trade Profit Job Executed!";
});
//cron url
Route::get('/cron', [AutoTaskController::class, 'autotopup'])->name('cron');
//Front Pages Route
Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('terms', [HomePageController::class, 'terms'])->name('terms');
Route::get('privacy', [HomePageController::class, 'privacy'])->name('privacy');
Route::get('about', [HomePageController::class, 'about'])->name('about');
Route::get('contact', [HomePageController::class, 'contact'])->name('contact');
// Route::get('/captcha', [CaptchaController::class, 'generateCaptcha']);

Route::get('/legal-docs', [HomePageController::class, 'faq'])->name('faq');



Route::get('markets', [HomePageController::class, 'pricing'])->name('pricing');
Route::get('licences', [HomePageController::class, 'licences'])->name('licences');
Route::get('risk', [HomePageController::class, 'risk'])->name('risk');
Route::get('security', [HomePageController::class, 'safety'])->name('safety');
Route::get('careers', [HomePageController::class, 'service'])->name('service');
Route::get('webtrade', [HomePageController::class, 'trading'])->name('trading');
