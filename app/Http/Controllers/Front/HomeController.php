<?php

namespace App\Http\Controllers\Front;

use App\Models\Admin\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
        $best_books = Book::with('category')->limit(6)->get();

        return view('front.home',compact('best_books'));
    }




}
