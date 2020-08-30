<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Book;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class BookController extends Controller
{


   public function __construct()
   {
        $this->middleware('permission:read_books')->only('index');
        $this->middleware('permission:edit_books')->only(['edit','update']);
        $this->middleware('permission:create_books')->only(['create','store']);
        $this->middleware('permission:delete_books')->only('destroy');


   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    //    if($request->has('search') || $request->has('category')){

    //           $books = Book::with('category')->when($request->search,function($query){
    //               return $query->where("name", "like", "%" . request()->search . "%");
    //           })->when($request->category,function($category_query){
    //               return $category_query->where('category_id',request()->category)->where("category_id","!=",0);
    //           })->paginate(PAGINATE_COUNT);
    //                                        ;
    //           return view("admin.books.index", compact("books"));

    //     }

         $books = Book::with("category")->orderBy("id","desc")->get();

         return view("admin.books.index",compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.books.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $validated = $request->validated();

        try {

            if($request->has("photo")){
                $validated['photo'] = imageUpload($request->photo,"books");
            }

            $validated['category_id'] = $request->category_id ?? null;

            Book::create($validated);

            return redirect()->route("admin.books.index")->with(['success' => __("admin.success create")]);

        } catch (\Exception $ex) {

            return redirect(route("admin.books.index"))->with(['error' => __("admin.message error")]);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Book  $book
     * @return \Illuminate\Http\Response
     */
    // public function show(Book $book)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view("admin.books.edit",compact("book"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, Book $book)
    {
        try{

                $validated = $request->validated();

                $validated['category_id'] = $request->category_id ?? null;

                if($request->has("photo")){
                   $validated['photo'] = imageUpload($request->photo, "books");

                    if ($book->photo != "/images/books/default.jpg") {
                        deleteFile($book->photo);
                    }

                }

                $book->update($validated);

                 return redirect()->route("admin.books.index")->with(['success' => __("admin.success create")]);

        } catch (\Exception $ex) {

            return redirect(route("admin.books.index"))->with(['error' => __("admin.message error")]);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {



        try{

            if ($book->reservationActive) {
                return redirect(route("admin.books.index"))->with(['error' => __("admin.error_cant_delete_book")]);
            }

            $book->reservation()->delete();
            $book->delete();

            if ($book->photo != "/images/books/default.jpg") {
                deleteFile($book->photo);
            }
            return redirect()->route("admin.books.index")->with(['success' => __("admin.success delete")]);

         } catch (\Exception $ex) {

            return redirect(route("admin.books.index"))->with(['error' => __("admin.message error")]);

        }
    }
}
