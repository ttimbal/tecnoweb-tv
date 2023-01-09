<?php

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

/*Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});*/

Route::get('dashboard', \App\Http\Livewire\Dashboard\Dashboard::class)->middleware('auth')->name('dashboard');
Route::get('days', \App\Http\Livewire\Days\Days::class)->middleware('auth')->name('days');
Route::get('categories', \App\Http\Livewire\Categories\Categories::class)->middleware('auth')->name('categories');
Route::get('equipments', \App\Http\Livewire\Equipments\Equipments::class)->middleware('auth')->name('equipments');
Route::get('users', \App\Http\Livewire\Users\Users::class)->middleware('auth')->name('users');
Route::get('turns', \App\Http\Livewire\Turns\Turns::class)->middleware('auth')->name('turns');
Route::get('calendar', \App\Http\Livewire\Calendar\Main::class)->middleware('auth')->name('calendar');

Route::post('/calendar', function () {
    return '';
})->name('calendar.store');

Route::put('/calendar', function () {
    return '';
})->name('calendar.update');

Route::delete('/calendar', function () {
    return '';
})->name('calendar.destroy');
