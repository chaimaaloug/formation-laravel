<?php

use App\Http\Controllers\AuteurController;
use App\Http\Controllers\BlogController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/blog')->name('blog.')->controller(BlogController::class)->group(function () {

    Route::get('/', 'index')->name('index');

    Route::get('/new', 'create')->name('create');

    Route::post('/new', 'store');

    Route::get('/{post:slug}/edit', 'edit')->name('edit');

    Route::post('/{post:slug}/edit', 'update');

    Route::delete('/{post:slug}/delete', 'delete')->name('delete');

    Route::get('/{post:slug}', 'show')->where([
        'post' => '[a-z0-9\-]+'
    ])->name('show');
});

Route::prefix('/auteur')->name('auteur.')->controller(AuteurController::class)->group(function () {

    Route::get('/', 'index')->name('index');

    Route::get('/new', 'create')->name('create');

    Route::post('/new', 'store');

    Route::get('/{auteur:slug}/edit', 'edit')->name('edit');

    Route::post('/{auteur:slug}/edit', 'update');

    Route::delete('/{auteur:slug}/delete', 'delete')->name('delete');

    Route::get('/{auteur:slug}', 'show')->where([
        'auteur' => '[a-z0-9\-]+'
    ])->name('show');
});
