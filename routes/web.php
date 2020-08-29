<?php

use App\Models\Admin\Category;
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





Route::group(['namespace' => 'Front'], function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get("/books","BookController@index")->name("books");
    Route::get("/books/{book}", "BookController@show")->name('book.show');




    Route::group(['middleware' => 'auth:web'], function() {

         Route::get("logout" , "Auth\LoginController@logout")->name('logout');

         Route::get("/books/{book}/reservation", "BookController@reservationView")->name('books.reservation');
    });



    Route::group(['middleware' => 'guest','namespace' => "Auth"],function(){
        Route::get('login', "LoginController@login")->name('login');
        Route::post('login', "LoginController@loginSubmit")->name('login.submit');
    });

});
