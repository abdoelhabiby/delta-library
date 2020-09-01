<?php

use Illuminate\Support\Facades\Route;

define("PAGINATE_COUNT", 10);

Route::group(["namespace" => "Admin"], function () {

    route::group(["middleware" => "auth:admin"], function () {

        Route::get("/", "HomeController@index")->name("admin.home");



        Route::resources([
            "admins" => "AdminController",
            "employees" => "EmployeeController",
            "students" => "StudentController",
            "categories" => "CategoryController",
            "books" => "BookController"
        ], [
            'as' => "admin", "except" => "show"
        ]);

        //------------------- --- profile ----------------------------------------
        Route::get("admin/profile", "ProfileController@index")->name('admin.profile');
        Route::get("admin/profile/edit", "ProfileController@edit")->name('admin.profile.edit');
        Route::put("admin/profile/update", "ProfileController@update")->name('admin.profile.update');
        //------------------end profile ------------------------------------------

        Route::get("admins/{admin}/show", "AdminController@show")->name("admin.admins.show");
        Route::get("employees/{employee}/show", "EmployeeController@show")->name("admin.employees.show");

        Route::get("reservations", "BookReservationController@index")->name("admin.reservations.index");
        Route::post("reservations/{reservation}/active", "BookReservationController@active")->name("admin.reservations.active");
        Route::post("reservations/{reservation}/receive_in", "BookReservationController@receive_in")->name("admin.reservations.receive_in");
        Route::post("reservations/{reservation}/retrieved_in", "BookReservationController@retrieved_in")->name("admin.reservations.retrieved_in");
        Route::delete("reservations/{reservation}", "BookReservationController@destroy")->name("admin.reservations.destroy");


        //--------------------------------contact us----------------------------------

        Route::get("contact-us", "ContactUsController@index")->name("admin.contactUs.index");
        Route::get("contact-us/{contact}", "ContactUsController@show")->name("admin.contactUs.show");
        Route::post("contact-us/{contact}", "ContactUsController@response")->name("admin.contactUs.response");
        Route::delete("contact-us/{contact}", "ContactUsController@destroy")->name("admin.contactUs.destroy");

        //--------------------------------end contact us-------------------------------



        Route::get("logout", "Auth\LoginController@logout")->name("admin.logout");
    });




    Route::group(['middleware' => "guest:admin"], function () {

        Route::get("/login", "Auth\LoginController@showLoginForm")->name("admin.login");

        Route::post("/login", "Auth\LoginController@login")->name("admin.login");
    });
});


Route::get("test", function () {

    return "test";
});
