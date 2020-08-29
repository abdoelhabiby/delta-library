<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index(){
        $employees = Admin::role("employees")->orderBy("id", 'desc')->get();

       return view("admin.home",compact('employees'));


    }
}
