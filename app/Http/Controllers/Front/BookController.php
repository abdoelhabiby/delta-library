<?php

namespace App\Http\Controllers\Front;

use App\Models\Admin\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;


class BookController extends Controller
{

    public function index(Request $request)
    {

        $books = [];

        if($request->has('category')){
            $books = Book::whereHas('category', function (Builder $query) {
                $query->where('name', 'like', request()->category);
            })->orderBy('id','desc')->paginate(PAGINATE_COUNT);
            return view('front.books.index', compact('books'));
        }

        if($request->has('search') && $request->has('search') != ''){
            $books = Book::with('category')->where('name', 'like', '%' . request()->search . '%')->orderBy('id','desc')->paginate(PAGINATE_COUNT);

            return view('front.books.index', compact('books'));
        }



        $books = Book::with(['category'])->orderBy('id','desc')->paginate(PAGINATE_COUNT);

        return view('front.books.index',compact('books'));
    }




    public function show(Book $book)
    {
        return view("front.books.show",compact('book'));
    }




}
