<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
// Route::get('/catalogs', [App\Http\Controllers\CatalogController::class, 'index']);
// Route::get('/catalogs/create', [App\Http\Controllers\CatalogController::class, 'create']);
// Route::post('/catalogs', [App\Http\Controllers\CatalogController::class, 'store']);
// Route::get('/catalogs/{catalog}/edit', [App\Http\Controllers\CatalogController::class, 'edit']);
// Route::put('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'update']);
// Route::delete('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'destroy']);

// Route::get('/books', [App\Http\Controllers\BookController::class, 'index']);
// Route::get('/authors', [App\Http\Controllers\AuthorController::class, 'index']);

// Route::get('/publishers', [App\Http\Controllers\PublisherController::class, 'index']);
// Route::get('/publishers/create', [App\Http\Controllers\PublisherController::class, 'create']);
// Route::get('/publishers/{publisher}/edit', [App\Http\Controllers\PublisherController::class, 'edit']);
// Route::delete('/publishers/{publisher}', [App\Http\Controllers\CatalogController::class, 'destroy']);

// Route::get('/members', [App\Http\Controllers\MemberController::class, 'index']);

Route::resource('/authors', App\Http\Controllers\AuthorController::class);

Route::resource('/catalogs', App\Http\Controllers\CatalogController::class);

Route::resource('/publishers', App\Http\Controllers\PublisherController::class);

Route::resource('/members', App\Http\Controllers\MemberController::class);

Route::resource('/books', App\Http\Controllers\BookController::class);

Route::resource('/transactions', App\Http\Controllers\TransactionController::class);

Route::get('api/transactions', [App\Http\Controllers\TransactionController::class, 'api']);

Route::get('api/authors', [App\Http\Controllers\AuthorController::class, 'api']);

Route::get('api/publishers', [App\Http\Controllers\PublisherController::class, 'api']);

Route::get('api/members', [App\Http\Controllers\MemberController::class, 'api']);

Route::get('test_spatie/members', [App\Http\Controllers\MemberController::class, 'test_spatie']); //test spatie

Route::get('api/books', [App\Http\Controllers\BookController::class, 'api']);