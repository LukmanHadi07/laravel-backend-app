<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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
    return view('auth.login', ['type_menu' => '']);
});


/*
Noted Middlware handle to auth login to login page home
*/
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('home', function () {
        return view('pages.dashboard', ['type_menu' => '']);
    })->name('home')->middleware('can:dashboard');
    Route::get('edit-profile', function () {
        return view('pages.profile', ['type_menu' => '']);
    })->name('edit.profile');

    Route::resource('user', UserController::class);
    });





// Route::get('/', function () {
//     return view('pages.blank-page', ['type_menu' => '']);
// });

// Route::get('/login', function () {
//     return view('auth.login', ['type_menu' => '']);
// });

// Route::get('/register', function () {
//     return view('auth.register', ['type_menu' => '']);
// });

// Route::get('/reset', function () {
//     return view('auth.reset', ['type_menu' => '']);
// });

// Route::get('/verify', function () {
//     return view('auth.verify', ['type_menu' => '']);
// });

// Route::get('/forgot', function () {
//     return view('auth.forgot', ['type_menu' => '']);
// });
