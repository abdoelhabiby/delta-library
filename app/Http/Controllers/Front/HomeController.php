<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('front.home');
    }




}
