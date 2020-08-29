<?php

use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

define("PAGINATE_COUNT",10);

Route::group(["namespace" => "Admin"],function(){

    route::group(["middleware" => "auth:admin"],function(){

        Route::get("/", "HomeController@index")->name("admin.home");



        Route::resources([
            "admins" => "AdminController",
            "employees" => "EmployeeController",
            "students" => "StudentController",
            "categories" => "CategoryController",
            "books" => "BookController"
        ], [
            'as' => "admin","except" => "show"
            ]);


            Route::get("admins/{admin}/show", "AdminController@show")->name("admin.admins.show");
            Route::get("employees/{employee}/show", "EmployeeController@show")->name("admin.employees.show");





        Route::get("logout","Auth\LoginController@logout")->name("admin.logout");

    });




    Route::group(['middleware' => "guest:admin"],function(){

        Route::get("/login", "Auth\LoginController@showLoginForm")->name("admin.login");

        Route::post("/login", "Auth\LoginController@login")->name("admin.login");
    });

});


Route::get("test",function(){

return "test";

});
