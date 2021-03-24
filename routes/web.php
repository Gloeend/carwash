<?php

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TypeServiceController;
use App\Http\Controllers\Admin\MarkController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\MmcController;

use App\Models\Mark;
use App\Models\Models;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('main');
})->name('home');

Route::get('/home', function () {
    return view('main');
})->name('home');
Route::get('/service', function () {
    return view('service');
})->name('service');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/order', [App\Http\Controllers\OrderController::class, 'render'])->name('order');

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

Route::post('/request', [App\Http\Controllers\OrderController::class, 'request'])->name('request');

Route::post('/order/get-service', [App\Http\Controllers\OrderController::class, 'getService'])->name('order-get-service');
Route::post('/order/get-class', [App\Http\Controllers\OrderController::class, 'getClass'])->name('order-get-class');
Route::post('/order/get-mmc', [App\Http\Controllers\OrderController::class, 'getMMC'])->name('order-get-mmc');
Route::post('/get-models', [App\Http\Controllers\OrderController::class, 'getModels'])->name('get-models');
Route::middleware(['guest'])->group(function () {
    Route::any('/admin/login', [AdminController::class, 'login'])->name('login');
});
Route::middleware(['auth'])->group(function () {

    Route::get('/admin/logout', function () {
        Auth::logout();
        return redirect(route('login'));
    })->name('logout');
    Route::get('/admin', [AdminController::class, 'main'])->name('admin');
    Route::get('/admin/users', [UserController::class, 'view'])->name('users-admin');
    Route::post('/admin/users/create', [UserController::class, 'create'])->name('users-create');
    Route::post('/admin/users/update', [UserController::class, 'update'])->name('users-update');
    Route::post('/admin/users/delete', [UserController::class, 'delete'])->name('users-delete');
    Route::post('/admin/users/fetch', [UserController::class, 'fetch'])->name('users-fetch');

    Route::get('/admin/services', [ServiceController::class, 'view'])->name('services-admin');
    Route::post('/admin/services/create', [ServiceController::class, 'create'])->name('services-create');
    Route::post('/admin/services/update', [ServiceController::class, 'update'])->name('services-update');
    Route::post('/admin/services/delete', [ServiceController::class, 'delete'])->name('services-delete');
    Route::post('/admin/services/fetch', [ServiceController::class, 'fetch'])->name('services-fetch');

    Route::get('/admin/types', [TypeServiceController::class, 'view'])->name('types-admin');
    Route::post('/admin/types/create', [TypeServiceController::class, 'create'])->name('types-create');
    Route::post('/admin/types/update', [TypeServiceController::class, 'update'])->name('types-update');
    Route::post('/admin/types/delete', [TypeServiceController::class, 'delete'])->name('types-delete');
    Route::post('/admin/types/fetch', [TypeServiceController::class, 'fetch'])->name('types-fetch');

    Route::get('/admin/mmc', [MmcController::class, 'view'])->name('mmc-admin');
    Route::post('/admin/mmc/create', [MmcController::class, 'create'])->name('mmc-create');
    Route::post('/admin/mmc/update', [MmcController::class, 'update'])->name('mmc-update');
    Route::post('/admin/mmc/delete', [MmcController::class, 'delete'])->name('mmc-delete');
    Route::post('/admin/mmc/fetch', [MmcController::class, 'fetch'])->name('mmc-fetch');

    Route::get('/admin/mark', [MarkController::class, 'view'])->name('marks-admin');
    Route::post('/admin/mark/create', [MarkController::class, 'create'])->name('marks-create');
    Route::post('/admin/mark/update', [MarkController::class, 'update'])->name('marks-update');
    Route::post('/admin/mark/delete', [MarkController::class, 'delete'])->name('marks-delete');
    Route::post('/admin/mark/fetch', [MarkController::class, 'fetch'])->name('marks-fetch');

    Route::get('/admin/class', [ClassController::class, 'view'])->name('classes-admin');
    Route::post('/admin/class/update', [ClassController::class, 'update'])->name('classes-update');
    Route::post('/admin/class/fetch', [ClassController::class, 'fetch'])->name('classes-fetch');

    Route::get('/admin/order', [OrderController::class, 'view'])->name('orders-admin');
    Route::post('/admin/order/update', [OrderController::class, 'update'])->name('orders-update');
    Route::post('/admin/order/delete', [OrderController::class, 'delete'])->name('orders-delete');
    Route::post('/admin/order/fetch', [OrderController::class, 'fetch'])->name('orders-fetch');
});
