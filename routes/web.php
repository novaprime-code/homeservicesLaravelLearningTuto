<?php

use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\Sprovider\SproviderDashboardComponent;
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
    return view('welcome');
});

Route::get('/home', function () {
    return view('layouts.base');
});
Route::get('/', HomeComponent::class)->name('home');
Route::get('/customer/dashboard', function () {
    return view('customer.dashboard');
});

//for RouteServiceProvider
Route::middleware(['auth:sanctum', 'verified', 'authsprovider'])->group(function () {
    Route::get('/sprovider/dashboard', SproviderDashboardComponent::class)->name('sprovider.dashboard');
});


//For admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
});
//For Customer
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/customer/dashboard', function () {
        return view('customer.dashboard');
    });
});
// Route::middleware(['auth:sanctum', 'verified'])->group(function () {
//     Route::get('/customer/dashboard', CustomerDashboardComponent::class)->name('customer.dashboard');
// });