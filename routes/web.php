<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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


Route::controller(ContactController::class)->group(function (){
    Route::get('/contacts', 'index')->name('index.contact');
    Route::get('/contacts/create', 'create')->name('create.contact');
    Route::post('/contacts', 'store')->name('store.contact');
    Route::get('/contacts/{id}', 'view')->name('show.contact');
    Route::get('/contacts/{id}/edit', 'edit')->name('edit.contact');
    Route::put('/contacts/{id}', 'update')->name('update.contact');
    Route::delete('/contacts/{id}', 'destroy')->name('delete.contact');

    Route::get('/search', 'search')->name('search.contact');
    Route::get('/sort', 'sort')->name('sort.contact');

});
