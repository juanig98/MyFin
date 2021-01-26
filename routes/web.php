<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\SettingsController;
use App\Models\Badge;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
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


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::redirect('/dashboard', '/', 302);

    Route::get('/', function () {
        return view('private.dashboard');
    })->name('dashboard');


    Route::get('ajustes', [SettingsController::class, 'index'])->name('settings');
    Route::get('cuenta', [AccountController::class, 'index'])->name('account');




    Route::prefix('dev')->middleware('dev')->group(function () {

        Route::get('fecha', function () {

            $date = Carbon::create("2019-02-01 03:45:27");
            // $date = Carbon::now();
              return $date->format('d/m/Y');

        });
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
