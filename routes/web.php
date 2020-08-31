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



Route::post("contact-us", "Admin\ContactUsController@store")->name('contact_us');


Route::group(['namespace' => 'Front'], function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get("/books","BookController@index")->name("books");
    Route::get("/books/{book}", "BookController@show")->name('book.show');





    Route::group(['middleware' => 'auth:web'], function() {

         Route::get("logout" , "Auth\LoginController@logout")->name('logout');

         Route::post("/books/{book}/reservation", "BookReservationController@store")->name('books.reservation');
         Route::post("/students/reservation/{reservation}/cancel", "BookReservationController@reservationCancel")->name('student.reservation.cancel');
         Route::get("/student/books", "BookReservationController@books")->name('student.books');
    });



    Route::group(['middleware' => 'guest','namespace' => "Auth"],function(){
        Route::get('login', "LoginController@login")->name('login');
        Route::post('login', "LoginController@loginSubmit")->name('login.submit');
    });

});
