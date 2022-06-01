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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', function () {
            return view('dashboard');
        })->name('user');
    });

    Route::group(['prefix' => 'company'], function () {
        Route::get('/', function () {
            return view('dashboard');
        })->name('company');
    });

    Route::group(['prefix' => 'topic'], function () {
        Route::get('/', function () {
            return view('dashboard');
        })->name('topic');
    });

    Route::group(['prefix' => 'tag'], function () {
        Route::get('/', function () {
            return view('dashboard');
        })->name('tag');
    });

    Route::group(['prefix' => 'post'], function () {
        Route::get('/', function () {
            return view('dashboard');
        })->name('post');
    });
});


require __DIR__ . '/auth.php';
