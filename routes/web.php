<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\BookshelfController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RentController;
use App\Models\User;
use App\Models\Book;
use App\Models\Bookshelf;
use App\Models\Genre;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->prefix('manipulate')->name('manipulate.')->group(function () {
    //BOOKSHELVES
    Route::resource('bookshelves', BookshelfController::class)->except('show');

    //GENRES
    Route::resource('genres', GenreController::class)->except('show');

    //BOOKS
    Route::resource('books', BookController::class);

    //RENTS
    Route::get('rents/', [RentController::class, 'load'])->name('rents.load');
    Route::post('rents/{user_id}/{book_id}', [RentController::class, 'rent'])->name('rents.rent');
    Route::delete('rents/{user_id}/{book_id}', [RentController::class, 'unrent'])->name('rents.unrent');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard', [
        'users' => User::count(),
        'books' => Book::where('active', 1)->count(),
        'genres' => Genre::where('active', 1)->count(),
        'bookshelves' => Bookshelf::where('active', 1)->count(),
    ]);
})->name('dashboard');