<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [BaseController::class, 'index'])->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/service', function () {
    return view('service.index');
})->middleware(['auth', 'verified'])->name('service');

Route::middleware('auth')->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.list');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::get('user/add', [UserController::class, 'add'])->name('user.add');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::patch('/user', [UserController::class, 'update'])->name('user.update');
    Route::patch('/user/reset-password', [UserController::class, 'resetPassword'])->name('user.reset-password');
    Route::delete('/user/delete', [UserController::class, 'destroy'])->name('user.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/detail', [DetailController::class, 'edit'])->name('detail');
    Route::patch('/detail/about', [DetailController::class, 'aboutUpdate'])->name('detail.about.update');
    Route::patch('/detail/vision', [DetailController::class, 'visionUpdate'])->name('detail.vision.update');
    Route::patch('/detail/mission', [DetailController::class, 'missionUpdate'])->name('detail.mission.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/client', [ClientController::class, 'edit'])->name('client');
    Route::patch('/client', [ClientController::class, 'update'])->name('client.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/gallery', [GalleryController::class, 'edit'])->name('gallery');
    Route::patch('/gallery/{gallery}', [GalleryController::class, 'update'])->name('gallery.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/social-media', [SocialMediaController::class, 'edit'])->name('social-media');
    Route::patch('/social-media', [SocialMediaController::class, 'update'])->name('social-media.update');
});

require __DIR__ . '/auth.php';
