<?php

use App\Models\Badge;
use App\Models\User;
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


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::redirect('/dashboard', '/', 302);

    Route::get('ajustes', function () {
        return "Estos son los ajustes";
    })->name('settings');

    Route::get('cuenta', function () {
        return "La cuenta";
    })->name('account');



    Route::middleware(['authorized'])->group(function () {

        Route::get('usuarios', function () {
            $users = User::all();
            return $users;
        });
        Route::get('divisas', function () {
            $badges = Badge::all();
            return $badges;
        });

    });
});
