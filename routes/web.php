<?php

use App\Models\Book;
use Illuminate\Http\Request;
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


Route::get('/', function (Request $request) {
    $search = $request->input('search');
    $search = isset($search) ? $search : '';

    $books = Book::search($search);
    return inertia('main', [
        'books' => $books
    ]);
});

Route::get('/book', function (Request $request) {
    $id = $request->input('id');
    $id = isset($id) ? $id : '';
    $book = Book::find($id);
    return inertia('book', [
        'book' => $book
    ]);
});

