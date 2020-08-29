<?php

namespace App\Http\Controllers\Front;

use App\Models\Admin\Book;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Http\Controllers\Controller;

class BookController extends Controller
{

    public function index()
    {

        $books = Book::with(['category'])->paginate(PAGINATE_COUNT);

        return view('front.books.index',compact('books'));
    }




    public function show(Book $book)
    {
        return view("front.books.show",compact('book'));
    }


    public function reservationView (Book $book)
    {
        return $book;
    }


}
