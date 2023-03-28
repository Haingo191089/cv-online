<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\CvSettingsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.client.cv.cv');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [LoginController::class, 'viewLogin'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'handleLogin'])->name('admin.handleLogin');
    
    Route::middleware(['auth'])->group(function () {
        Route::get('/cv_settings', [CvSettingsController::class, 'viewCvSetting'])->name('admin.cv_settings');

        Route::get('/icons/get-all', [CvSettingsController::class, 'getListIcons'])->name('admin.get_list_icons');
    });
    
});