<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CampaignController;

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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');
});

// routes/web.php


Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show');
Route::post('/customers/search', [CustomerController::class, 'search'])->name('customers.search');
Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::patch('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');


Route::get('/campaigns/create', [CampaignController::class, 'create'])->name('campaigns.create');
Route::post('/campaigns', [CampaignController::class, 'store'])->name('campaigns.store');
